
<link rel="stylesheet" href="/css/bootstrap.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="/css/site.css" type="text/css" media="screen" title="no title" charset="utf-8">

<script type="text/javascript" charset="utf-8" src="/scripts/modernizr.js" ></script>
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
				yepnope('/scripts/jquery.form.js');
				yepnope('/scripts/bootstrap.js');
				yepnope('/scripts/ajaxfileupload.js');
				yepnope('/scripts/jquery.Jcrop.min.js');
				yepnope('/scripts/application.js');
				yepnope('/scripts/underscore-1.3.1.js');
				yepnope('/scripts/json2.js');
				yepnope('/scripts/backbone.js');
				yepnope('/scripts/jquery.ba-dotimeout.js');
				yepnope('/scripts/backbone.infinitscroll.js');
				yepnope('/scripts/jquery.mustache.js');
				yepnope('/scripts/message.js');
				yepnope('/scripts/comment.js');
				yepnope('/scripts/user.js');
			}
		}
	}
]);
</script>


