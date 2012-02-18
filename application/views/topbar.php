<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<div class="span8 nav-collapse">
				<ul class="nav">
					<li>
						<a href="<?php echo site_url(); ?>" class="brand">首页</a>
					</li>
					<li>
						<a	href="/regions/hot">热门地标</a>
					</li>
					<li>
						<a href="/messages/hot">热门事件</a>
					</li>
				</ul>
			</div>
					<?php if($this->session->userdata('is_login') == 'true') { ?>
						<ul class="nav pull-right">
							<li  id="user-menu" class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#user-menu"><?php echo $this->session->userdata('user')->name; ?>								<b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li>
										<a href="/users/<?php echo $this->session->userdata('user')->id; ?>">
											<i class="icon-home"></i> 我的主页</a>
									</li>
									<li>
										<a href="/user/setting"><i class="icon-edit"></i> 设置</a>
									</li>
									<li class="divider"></li>
									<li>
										<a href="/logout"><i class="icon-off"></i> 退出</a>
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
