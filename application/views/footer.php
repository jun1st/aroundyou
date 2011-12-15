<div id="footer">
      <div class="inner">
        <div class="container">
          <p class="right"><a href="#">Back to top</a></p>
          <p>
            Designed and built with all the love in the world <a href="http://twitter.com/twitter" target="_blank">@twitter</a> by <a href="http://twitter.com/mdo" target="_blank">@mdo</a> and <a href="http://twitter.com/fat" target="_blank">@fat</a>.<br />
            Licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>.
          </p>
        </div>
      </div>
    </div>
<script type="text/javascript">
Modernizr.load([
	{
	  load: '/scripts/jquery-1.7.1.min.js',
	  callback: function (url, result, key) {
			// whenever this runs, your script has just executed.
	    	if (window.jQuery) {
		    	// Load jQuery from our local server
		    	// Inject it into the middle of our order of scripts to execute
		    	// even if other scripts are listed after this one, and are already
		    	// done loading.
		      	yepnope('/scripts/bootstrap-dropdown.js');
			}
		}
	},
	{
		test: Modernizr.geolocation,
		yep : '/scripts/geo.js',
		nope: 'geo-polyfill.js',
		callback:function()
		{
			if(geo_position_js.init()){
				yepnope('/scripts/jquery.cookies.2.2.0.js');
				geo_position_js.getCurrentPosition(success_callback,error_callback,{enableHighAccuracy:true,options:5000});
			}
			else{
				alert("Functionality not available");
			}

			function success_callback(p)
			{
				var geoCookie = { latitude:p.coords.latitude.toFixed(5), longitude:p.coords.longitude.toFixed(5)};
				
				$.cookies.set('user_geo', geoCookie);
				alert('lat='+p.coords.latitude.toFixed(5)+';lon='+p.coords.longitude.toFixed(5));
			}

			function error_callback(p)
			{
				alert('error='+p.message);
			}
		}
		
	}
]);
</script>