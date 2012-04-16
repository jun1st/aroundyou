
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title><?php echo $user->name . '的主页'; ?></title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
</head>

<body>

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>
	<div class="container">
		<div id="userprofile">
			<div class="subheader">
				<?php if($this->session->userdata('user') != null && $this->session->userdata('user')->id == $user->id): ?>
				<div class="links" style="float:right;margin-top:4px;">
					<a href="/user/setting">edit</a>
				</div>
			<?php endif; ?>
			<h3><?php echo $user->name; ?></h3>
		</div>
		<div class="profileimageupload" style="float:left;width:200px;text-align:center;padding-top:10px">
			<?php if(empty($user->profile_image_path)): ?>
			<img title="profile image" style="border:4px #ccc solid;" src="/img/default.jpeg"/>
		<?php else: ?>
		<img title="profile image" style="border:4px #ccc solid;" src="<?php echo $user->profile_image_path; ?>"/>
	<?php endif; ?>
</div>
<div class="profiledetail" style="float:left; padding:10px">
	<table class="table">
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
		<div id="useractivities" class="tabbable">
			<ul class="nav nav-tabs">
				<li class='active'><a href='#mytopics' data-toggle="tab">发表的话题</a></li>
				<li><a href='#mycomments' data-toggle="tab">发出的评论</a></li>
			</ul>
			<div class="tab-content" id="my-contents">
				<div class="tab-pane active" id="mytopics">
					<ul id="messagesView">
					</ul>
				</div>
				<div class="tab-pane" id="mycomments">
					<ul id="commentsView">
					</ul>
				</div>
			</div>
		</div>
	</div>
	<script type="text/template" id="message-template">
		<div class="entry">
			<div class="region">
				<a href="/byregion?name={{region_name}}  %>"><i class="icon-map-marker"></i>{{region_name}}</a>
			</div>
			<div class="message">
				<p>{{content}}
					<a href="/message/view/{{ message_id }}" class="view_link">查看</a>
				</p>
				<span class="time"><i class="icon-time"></i>{{ posted_time }}</span>
			</div>
		</div>
	</script>
	<script type="text/html" id="comment-template">
		<li>
			<p>{{ content }}</p>
			<div class='author'>
				<i class="icon-time"></i>{{posted_time}}
			</div>
		</li>
	</script>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/footer.php';  ?>
</body>
</html>
