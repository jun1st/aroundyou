
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html>
<head>
	<title>index</title>
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
	    <div class="content">
			<ul>
	      		<?php foreach ($messages as $item): ?>
					<li style="border-bottom:1px solid #cccccc;list-style:none;">
					<div>
						<div class="user">
							<?php echo $item->user_name; ?>
						</div>
						<div class="message">
							<h4>
								<a href="/message/view/<?php echo $item->message_id; ?>">
								<?php echo $item->topic; ?></a>
							</h4>
							<p><?php echo $item->content; ?></p>
							<div>
								<?php echo $item->posted_time; ?>
							</div>
						</div>
					</div>
					</li>
				<?php endforeach; ?>
	    	</ul>
		</div>
	  </div>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/footer.php';  ?>
</body>
</html>
