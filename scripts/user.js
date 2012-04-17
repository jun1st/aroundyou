(function()
{
	  // Create our global collection of **Todos**.
  window.myMessages = new window.MessageList({ url: "/user/messages"});
  
  window.MyMessagesView = Backbone.View.extend({
    
    el: $(window),
    //infinitScroll: null,

    initialize: function(){
      this.infinitScroll = new Backbone.InfinitScroll(this, myMessages, {"add": this.addOne, "reset": this.addAll});
    },

    addOne: function(message){
      var view = new window.MessageView({model:message});
      $('#messagesView').append(view.render().el);
    },
    addAll: function(){
      window.myMessages.each(this.addOne);
    }
  });

  var myMessagesView = new MyMessagesView;
})();