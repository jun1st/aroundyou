<div class="pull-right span3">
	<h3>热门地标</h3>
	<ul id="hot-regions">
		<?php foreach ($regions as $region) {
			echo "<li><a href='/byregion?name=$region->name' class='region_tag' title='" . $region->name . "'>" . $region->name . "</a></li>";
		} ?>
	</ul>
</div>
