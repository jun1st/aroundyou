<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<div class="nav-collapse">
				<ul class="nav">
					<li>
						<a href="<?php echo site_url(); ?>">Aroundyou</a>
					</li>
					<!-- <li>
											<form action="/blog?page=1" accept-charset="UTF-8" method="post" id="search-theme-form" style="padding-top:10px;margin-bottom:0px;">
												<input id="search-q" name="search_theme_form" type="text" maxlength="128" size="15" value="Search" title="Enter search terms" placeholder="Search">
											</form>
										</li> -->
				</ul>
			</div>
					<?php if($this->session->userdata('is_login') == 'true') { ?>
						<ul class="nav pull-right">
							<li  id="user-menu" class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#user-menu"><?php echo $this->session->userdata('user')->name; ?>								<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li>
										<a href="/users/<?php echo $this->session->userdata('user')->id; ?>">
											我的主页</a>
									</li>
									<li>
										<a href="/user/setting">设置</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="/logout">退出</a>
									</li>
								</ul>
							</li>
						</ul>
				<?php } else { ?>
					<ul class="nav pull-right">
						<li>
							<a href="/account/login">登陆</a></li>
						</ul>
						<?php } ?>
	
			</div>
		</div>
	</div>
