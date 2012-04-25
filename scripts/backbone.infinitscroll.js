(function(){
	Backbone.InfinitScroll = function(view, collection, options){
		options        = options || {},
		isFetch        = false,
		hasMoreToFetch = true,
		page           = 1,

		onScroll = function(){
			if ($(document).height() - 200 < $(document).scrollTop() + $(window).height()) {
        		
        		$.doTimeout(500, function(){
        			if (!isFetch && hasMoreToFetch ) {
        				isFetch = true;
        				console.log('scroll');
        				collection.fetch({
        					success: this.onFetchSuccess,
        					add: true,
        					data: {"page": page++}
        				});	
        			}
        		});
      		};
		},

		initialize = function(){
			$(window).bind('scroll', this.onScroll);

			collection.bind("add", options["add"], view);
			collection.bind("reset", options["reset"], view);

			collection.fetch();	
		},

		onFetchSuccess = function(collection, response){
			isFetch = false;
			console.log('finished');
			if (response.length == 0) {
				hasMoreToFetch = false;
			};
		};

		initialize();
	}
})();