// An example Backbone application contributed by
// [Jérôme Gravel-Niquet](http://jgn.me/). This demo uses a simple
// [LocalStorage adapter](backbone-localstorage.html)
// to persist Backbone models within your browser.

// Load the application once the DOM is ready, using `jQuery.ready`:
$(function(){

  // Todo Model
  // ----------

  // Our basic **Todo** model has `title`, `order`, and `done` attributes.
  var Message = Backbone.Model.extend({

    // Default attributes for the todo item.
    defaults: function() {
      return {
        message_id: 0,
        content: "",
        posted_time: null,
        comments_count: "",
        user_id: 0,
        user_name: "",
        user_description: "",
        profile_tiny_image_path: "",
        region_name: ""
      };
    },

    // Ensure that each todo created has `title`.
    initialize: function() {
      
    },

    

  });

  // Todo Collection
  // ---------------

  // The collection of todos is backed by *localStorage* instead of a remote
  // server.
  var MessageList = Backbone.Collection.extend({

    // Reference to this collection's model.
    model: Message,
    url: '/api/messages',
    page: 1,

    page_size: 10, 

    // We keep the Todos in sequential order, despite being saved by unordered
    // GUID in the database. This generates the next order number for new items.
    loadMore: function() {
      //load more messages to be implemented
    }

  });

  // The DOM element for a todo item...
  var MessageView = Backbone.View.extend({

    //... is a list tag.
    tagName:  "li",

    // Cache the template function for a single item.
    template: _.template($('#message-template').html()),



    // Re-render the titles of the todo item.
    render: function() {
      $(this.$el).html(this.template(this.model.toJSON()));
      return this;
    }

  });
  // Create our global collection of **Todos**.
  var messages = new MessageList;
  messages.fetch({
    success: function()
    {
      messages.each(function(message){
        var view = new MessageView({model: message});
        console.log(view.render().el);
        $('#messagesView').append(view.render().el);
      });
    }
  });

});
