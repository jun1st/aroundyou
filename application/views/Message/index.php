
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
					<div>
						<div class="user">
							<img src="<?php echo $item->profile_image; ?>" alt="profile" title="<?php echo $item->user_name; ?>" />
						</div>
						<div class="message">
							<h4>
								<a href="/message/view/<?php echo $item->message_id; ?>">
								<?php echo $item->topic; ?></a>
							</h4>
							<p><?php echo $item->content; ?></p>
							<div>
								<span><?php echo  "发布于: " .relativeTime($item->posted_time); ?></span>
							</div>
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
