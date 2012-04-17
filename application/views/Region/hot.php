
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
	    <div class="span8 pull-left">
            <div>
                <i class="icon-list"></i> 最新动态
            </div>
			<ul id="messages">
	      		<?php foreach ($regions as $item): ?>
					<li>
						<div class="entry">
							<div>
								<p><a href="/messages/inregion/<?php echo $item->name; ?>"><i class="icon-map-marker"></i><?php echo $item->name; ?></a></p>
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
