$(function() {
  
	window.Comment = Backbone.Model.extend({
  	});
	window.CommentList = Backbone.Collection.extend({
		page: 0,
    // Reference to this collection's model.
    model: Comment,
    url: function(){
    		return "/user/comments";
    }

  });

  // The DOM element for a todo item...
  window.CommentView = Backbone.View.extend({

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

});