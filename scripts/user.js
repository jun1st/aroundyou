$(function(){

  var user = window.user || {};

  user.myMessages = new window.MessageList({ url: "/user/messages"});
  
  user.myMessagesView = Backbone.View.extend({

    el: $(window),
    //infinitScroll: null,

    initialize: function(){
      this.infinitScroll = new Backbone.InfinitScroll(this, user.myMessages, {"add": this.addOne, "reset": this.addAll});
    },

    addOne: function(message){
      var view = new window.MessageView({model:message});
      $('#messagesView').append(view.render().el);
    },
    addAll: function(){
      user.myMessages.each(this.addOne);
    }
  });

  var myMessagesView = new user.myMessagesView;

  // Create our global collection of **Todos**.
  user.comments = new window.CommentList;
  
  user.MyCommentView = Backbone.View.extend({
    
    el: $(window),

    initialize: function(){

      this.infinitScroll = new Backbone.InfinitScroll(this, user.comments, {"add": this.addOne, "reset": this.addAll});
    },

    addOne: function(message){
      var view = new window.CommentView({model:message});
      $('#commentsView').append(view.render().el);
    },
    addAll: function(){
      user.comments.each(this.addOne);
    }
  });

  var myCommentView = new user.MyCommentView;

});