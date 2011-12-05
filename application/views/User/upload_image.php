<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>setting</title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
	<link rel="stylesheet" href="/css/jquery.Jcrop.css" type="text/css" charset="utf-8" >
	<script type="text/javascript" charset="utf-8" src="/scripts/jquery.min.js" ></script>
	<script type="text/javascript" charset="utf-8" src="/scripts/ajaxfileupload.js" ></script>
	<script type="text/javascript" charset="utf-8" src="/scripts/jquery.Jcrop.min.js" ></script>
</head>
<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>
	<div style="margin-top:40px; height:60px;">
		<div class="container">
			head lines;
		</div>
	</div>
	<div class="container">


		<input type="file" name="fileToUpload"  id="fileToUpload" />
		<input type="button" name="upload" id="upload"  value="Upload" />
	</div>
	<script language="Javascript">
		function setCoords(c)
		{
			$('#x').val(c.x);
			$('#x2').val(c.x2);
			$('#y').val(c.y);
			$('#y2').val(c.y2);
			$('#w').val(c.w);
			$('#h').val(c.h);
		}
	    jQuery(function() {
	        jQuery('#profileImage').Jcrop(
				{
					onSelect:setCoords,
					onChange:setCoords
				}
			);
	    });
		
		function ajaxFileUpload()
		{ 
	        $.ajaxFileUpload
	        (
	            {
	                url:'/user/upload', 
	                secureuri:false,
	                fileElementId:'fileToUpload',
	                dataType: 'json',
	                success: function (data, status)
	                {
	                    if(typeof(data.error) != 'undefined')
	                    {
	                        if(data.error != '')
	                        {
	                            alert(data.error);
	                        }else
	                        {
	                            alert(data.msg);
	                        }
	                    }
	                },
	                error: function (data, status, e)
	                {
	                    alert(e);
	                }
	            }
	        )

	        return false;

	    } 

		$(document).ready(function()
		{
			$('#upload').click(
				function()
				{
					ajaxFileUpload();
				}
			);
		});
	</script>
</body>
</html>