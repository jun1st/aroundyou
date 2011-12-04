<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>setting</title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
	<link rel="stylesheet" href="/css/jquery.Jcrop.css" type="text/css" charset="utf-8" >
	<script type="text/javascript" charset="utf-8" src="/scripts/jquery.min.js" ></script>
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

		<?php echo form_open_multipart('user/upload_image/');?>
		<img id="profileImage" src="<?php echo $user->profile_image_path; ?>" title="profile image" />
		<input type="file" name="userfile" size="200" />
		<br /><br />
		<input name="submit" type="submit" value="upload" />
		<input type="hidden" name="x" value="" id="x">
		<input type="hidden" name="y" value="" id="y">
		<input type="hidden" name="x2" value="" id="x2">
		<input type="hidden" name="y2" value="" id="y2">
		<input type="hidden" name="w" value="" id="w">
		<input type="hidden" name="h" value="" id="h">
		</form>
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
	</script>
</body>
</html>