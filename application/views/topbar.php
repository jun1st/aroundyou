<div class="navbar navbar-fixed-top" data-dropdown="dropdown">
	<div class="navbar-inner">
		<div class="container">
			<h3 style="display:inline;"><a class="logo" href="<?php echo site_url();?>">AroundYou</a></h3>
			<!-- <form action="/blog?page=1" accept-charset="UTF-8" method="post" id="search-theme-form" class="">
							<input id="search-q" name="search_theme_form" type="text" maxlength="128" size="15" value="Search" title="Enter search terms" placeholder="Search">
						</form> -->
			<div class="global-nav" style="float:right;">
				<!-- <div class="rightblock">
									<div class="well topbar-tweet-btn">
										<a class="btn-tweet" title="新消息" data-controls-modal="top-new-message" data-backdrop="true">
											<i class="nav-tweet"></i>
										</a>
									</div>
								</div> -->
	
				<?php if($this->session->userdata('is_login') == 'true') { ?>
					<ul class="nav rightblock">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle"><?php echo $this->session->userdata('user')->name; ?></a>
								<ul class="dropdown-menu">
									<li>
								<a href="/users/<?php echo $this->session->userdata('user')->id; ?>">
								我的主页</a>
									</li>
									<li>
										<a href="/user/setting">设置</a>
									</li>
									<li>
										<a href="/logout">退出</a>
									</li>
								</ul>
						</li>
					</ul>
				<?php } else { ?>
				<ul class="nav rightblock">
					<li>
						<a href="/login">登陆</a></li>
				</ul>
				<?php } ?>
	
			</div>
		</div>
	</div>
</div>
