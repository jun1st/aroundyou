
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html>
<head>
	<title>发生在你身边的事情</title>
	
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>

</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>
	<div id="actionbar">
		<div class="container">
			<a href="/message/add" title="发布消息" class="btn">发布消息</a>
		</div>
	</div>
	<div class="container">
	    <div class="content">
			<ul id="messages">
	      		<?php foreach ($messages as $item): ?>
					<li>
						<div class="entry">
							<h3>
								<a href="/message/view/<?php echo $item->message_id; ?>" class="topic">
								<?php echo $item->topic; ?></a>
							</h3>
							<div class="user">
								<a href="/users/<?php echo $item->user_id; ?>" title="查看<?php echo $item->user_name; ?>的信息" >
								<img src="<?php echo $item->profile_image; ?>" alt="profile" title="<?php echo $item->user_name; ?>" />
								</a>
								<h3>
								<?php echo "<a href=/users/$item->user_id title='查看$item->user_name 的信息' >$item->user_name</a>"; ?><strong><span class="description"><?php echo $item->user_description; ?></span></strong>
								</h3>
							</div>
							<p class="message"><?php echo $item->content; ?></p>
							<div>
								<span><?php echo  "发布于: " .relativeTime($item->posted_time); ?></span>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
	    	</ul>
		</div>
		<div class="rightsidebar" style="border:1px solid #cccccc">
			cool;
		</div>
	  </div>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/footer.php';  ?>
</body>
</html>
