$(function() {

	var Comment = Backbone.Model.extend({

  	});

	var CommentList = Backbone.Collection.extend({

		page: 0,
    // Reference to this collection's model.
    model: Comment,
    url: function(){
    		return "/user/comments";
    }

  });

  // The DOM element for a todo item...
  var CommentView = Backbone.View.extend({

    initialize:function()
    {
      this.model.bind('change', this.render, this);
    },

    //... is a list tag.
    tagName:  "li",

    // Cache the template function for a single item.
    template: $('#comment-template').html(),



    // Re-render the titles of the todo item.
    render: function() {
      //$(this.$el).html(this.template(this.model.toJSON()));
      $(this.$el).html($.mustache(this.template, this.model.toJSON()));
      return this;
    }

  });

  // Create our global collection of **Todos**.
  window.comments = new CommentList;
  
  window.MyCommentView = Backbone.View.extend({
    
    el: $(window),

    initialize: function(){

      this.infinitScroll = new Backbone.InfinitScroll(this, comments, {"add": this.addOne, "reset": this.addAll});
    },

    addOne: function(message){
      var view = new CommentView({model:message});
      $('#commentsView').append(view.render().el);
    },
    addAll: function(){
      comments.each(this.addOne);
    }
  });

  var myCommentView = new MyCommentView;

});