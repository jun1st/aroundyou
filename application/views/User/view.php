
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
			<div class="profileimageupload">
				<img title="profile image" src="<?php echo $user->profile_image_path; ?>"/>
			</div>
			<div class="profiledetail">
				<table class="zebra-striped">
					<tbody>
						<tr>
							<td>名字：</td>
							<td><strong><?php echo $user->name; ?></strong></td>
						</tr>
						<tr>
							<td>Email：</td>
							<td><a href="mailto:<?php echo $user->email; ?>"><?php echo $user->email; ?></a></td>
						</tr>
						<tr>
							<td>生日：</td>
							<td><?php echo $user->birthday; ?></td>
						</tr>
						<tr>
							<td>个人网站：</td>
							<td><a href="<?php echo $user->website; ?>" target="about"><?php echo $user->website; ?></a></td>
						</tr>
						<tr>
							<td>所在城市：</td>
							<td><?php echo $user->website; ?></td>
						</tr>
					<tbody>
				</table>
				<a href="/user/setting" class="btn">修改</a>	
			</div>
		</div>
		<div style="clear:both;">
		<div id="useractivities">
			<ul class="tabs">
				<li class='active'><a href='#'>发表的话题</a></li>
				<li><a href='#'>发出的评论</a></li>
			</ul>
		</div>
	</div>
</body>
</html>
