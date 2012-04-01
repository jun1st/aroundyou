<div class="pull-right span3">
	<h3>热门地标</h3>
	<ul id="hot-regions">
		<?php foreach ($regions as $region) {
			echo "<li><i class='icon-map-marker'></i><a href='/messages/inregion/" . $region->name . "' title=$region->name >" . $region->name . "</a></li>";
		} ?>
	</ul>
</div>
