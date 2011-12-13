<div class="topbar">
	<div class="container fixed">
	<h3><a class="logo" href="<?php echo site_url();?>">AroundYou</a></h3>
	<form action="/blog?page=1" accept-charset="UTF-8" method="post" id="search-theme-form" class="">
	<input id="search-q" name="search_theme_form" type="text" maxlength="128" size="15" value="Search" title="Enter search terms" placeholder="Search">
	</form>
	<?php if($this->session->userdata('is_login') == 'true') { ?>
		<ul class="nav rightblock">
			<li>
				<a href="/users/<?php echo $this->session->userdata('user')->id; ?>"><?php echo $this->session->userdata('user')->name; ?></a></li>
		</ul>
		</div>
	<?php } else { ?>
	<ul class="nav rightblock">
		<li>
			<a href="/login">登陆</a></li>
	</ul>
	</div>
	<?php } ?>
</div>