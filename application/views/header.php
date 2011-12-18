
<link rel="stylesheet" href="/css/bootstrap.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="/css/site.css" type="text/css" media="screen" title="no title" charset="utf-8">

<script type="text/javascript" charset="utf-8" src="/scripts/modernizr.js" ></script>
<script type="text/javascript" charset="utf-8" src="/scripts/jquery-1.7.1.min.js" ></script>
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
				yepnope('/scripts/bootstrap-modal.js');
			}
		}
	}
]);
</script>


