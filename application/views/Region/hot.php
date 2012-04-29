
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
                <i class="icon-list"></i> 本月热点区域
            </div>
			<ul id="messages">
	      		<?php foreach ($structured_regions as $key=>$name): ?>
					<li>
						<div class="entry">
							<div>
								<p>
									<?php echo "<i class='icon-map-marker'></i><a href='/messages/inregion/" . $name . "'>". $name ."</a>"; ?>
								</p>
								<p>
									<?php foreach ($hot_regions as $region) {
										if ($region->id == $key) {
											echo $region->street . " ";
										}
									} ?>
								</p>
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
