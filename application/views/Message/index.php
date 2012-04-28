
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html>
<head>
	<title>发生在你身边的事情</title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>

	<div class="container main">
	    <div class="span7 pull-left">
            <div>
                <i class="icon-list"></i> 最新动态
            </div>
			<ul id="messages">
	      		<?php foreach ($messages as $item): ?>
					<li>
						<div class="entry">
							<div class="message">
								<a href="/message/view/<?php echo $item->message_id; ?>" style="float:right"><span><?php echo is_null($item->comments_count) ? 0 : $item->comments_count; ?></span>条评论</a>
								<p><?php echo $item->content; ?>
									<a href="/message/view/<?php echo $item->message_id; ?>" class="view_link"><i class="icon-share"></i></a>
								</p>
								<a href="/messages/inregion/<?php echo $item->region_name; ?>">
									<i class="icon-map-marker"></i><?php echo $item->region_name . " " . $item->street; ?></a>						
								<div class="user">
									<a href="/users/<?php echo $item->user_id; ?>" title="查看<?php echo $item->user_name; ?>的信息" >
									</a>
									<h3>
									<?php echo "<a href=/users/$item->user_id title='查看$item->user_name 的信息' >$item->user_name</a>"; ?><strong><span class="description"><?php echo $item->user_description; ?></span></strong>
									</h3>
									<span class="time"><i class="icon-time"></i><?php echo " " . relative_time($item->posted_time); ?></span>
								</div>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
	    	</ul>
			<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/pager.php'; ?>
		</div>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/sidebar.php';  ?>
	  </div>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/footer.php';  ?>
</body>
</html>
