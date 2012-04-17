// An example Backbone application contributed by
// [Jérôme Gravel-Niquet](http://jgn.me/). This demo uses a simple
// [LocalStorage adapter](backbone-localstorage.html)
// to persist Backbone models within your browser.

// Load the application once the DOM is ready, using `jQuery.ready`:
$(function(){

  // Todo Model
  // ----------

  // Our basic **Todo** model has `title`, `order`, and `done` attributes.
  window.Message = Backbone.Model.extend({

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

  });


  window.MessageList = Backbone.Collection.extend({

    initialize: function(options)
    {
      this.url = options['url'];
    },

    model: Message,
    url: ""

  });

  // The DOM element for a todo item...
  window.MessageView = Backbone.View.extend({

    initialize:function()
    {
      this.model.bind('change', this.render, this);
    },

    // Cache the template function for a single item.
    template: $('#message-template').html(),

    // Re-render the titles of the todo item.
    render: function() {
      $(this.$el).html($.mustache(this.template, this.model.toJSON()));
      return this;
    }

  });

});
