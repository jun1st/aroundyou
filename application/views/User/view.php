
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>register</title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
</head>

<body>

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>
	<div class="container main">
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
							<td><?php echo $user->location; ?></td>
						</tr>
					<tbody>
				</table>
				<a href="/user/setting" class="btn">修改</a>	
			</div>
		</div>
		<div style="clear:both;">
		<div id="useractivities">
			<ul class="tabs">
				<li class='active'><a href='#mytopics'>发表的话题</a></li>
				<li><a href='#mycomments'>发出的评论</a></li>
			</ul>
			<div id="mytopics">
				<ul>
					<?php foreach ($messages as $item) : ?>
						<li>
							<div class="entry">
								<p class="message"><?php echo $item->content; ?>
									<a href="/message/view/<?php echo $item->message_id; ?>" class="view_link">查看</a>
								</p>
								<div class="tags">
									<a href="/byregion?name=<?php echo $item->region_name; ?>" class="region_tag"><?php echo $item->region_name; ?></a>
								</div>
								<div class="user">
									<span class="time"><?php echo  "发布于: " .relative_time($item->posted_time); ?></span>
								</div>
							
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div id="mycomments">
				comments
			</div>
		</div>
	</div>
</body>
</html>
