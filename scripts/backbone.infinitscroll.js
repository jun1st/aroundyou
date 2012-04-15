(function(){
	Backbone.InfinitScroll = function(view, collection, options){
		options = options || {},
		isFetch = false,
		hasMoreToFetch = true,

		onScroll = function(){
			if ($(document).height() - 200 < $(document).scrollTop() + $(window).height()) {
        		
        		$.doTimeout(500, function(){
        			if (!isFetch && hasMoreToFetch ) {
        				isFetch = true;
        				console.log('start fetch');
        				collection.fetch({
        					success: this.onFetchSuccess,
        					add: true
        				});	
        			}
        		});
      		};
		},

		initialize = function(){
			$(view.el).bind('scroll', this.onScroll);

			collection.bind("add", options["add"], view);
			collection.bind("reset", options["reset"], view);

			collection.fetch();
		},

		onFetchSuccess = function(collection, response){
			isFetch = false;
			if (response.length == 0) {
				hasMoreToFetch = false;
			};
		};

		initialize();
	}
})();