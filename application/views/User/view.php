
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>register</title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
</head>

<body>

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>
	<div style="margin-top:40px; height:60px;">
		<div class="container">
			head lines;
		</div>
	</div>
	<div class="container">
		<div id="userprofile">
			<img title="profile image" src="<?php echo $user->profile_image_path; ?>" style="width:128px;height:128px;"/>
			<?php echo $user->name; ?>
		</div>
		<div id="useractivities">
			<ul class="tabs">
				<li class='active'><a href='#'>发表的话题</a></li>
				<li><a href='#'>发出的评论</a></li>
			</ul>
		</div>
	</div>
</body>
</html>
