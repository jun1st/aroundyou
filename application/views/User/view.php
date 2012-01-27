
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title><?php echo $user->name . '的主页'; ?></title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
</head>

<body>

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>
	<div class="container main">
		<div id="userprofile">
			<div class="subheader">
			<div class="links" style="float:right;margin-top:4px;">
				<a href="/user/setting">edit</a>
			</div>
			<h3><?php echo $user->name; ?></h3>
			</div>
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
						<tr>
							<td>个人介绍:</td>
							<td><?php echo $user->description; ?></td>
						</tr>
					<tbody>
				</table>	
			</div>
		</div>
		<div style="clear:both;">
		<div id="useractivities">
			<ul data-tabs="tabs" class="tabs">
				<li class='active'><a href='#mytopics'>发表的话题</a></li>
				<li><a href='#mycomments'>发出的评论</a></li>
			</ul>
			<div class="tab-content" id="my-contents">
				<div class="tab-pane active" id="mytopics">
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
									
										<span class="time"><?php echo  "发布于: " .relative_time($item->posted_time); ?></span>
									
							
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="tab-pane" id="mycomments">
					<ul>
						<?php foreach ($comments as $item) : ?> 
							<li>
        						<p><?php echo decode($item->content); ?></p>
        						<div class='author'>
        							<?php echo '发布于 ' . relative_time($item->posted_time); ?>
        						</div>
							</li>
						<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
