<div class="rightsidebar">
	<h3>热门地标</h3>
	<ul id="hot-regions">
		<?php foreach ($regions as $region) {
			echo '<li><a href="#" class="region_tag" title="' . $region->name . '">' . $region->name . '</a></li>';
		} ?>
	</ul>
</div>
