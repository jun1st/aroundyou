<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>
			发布新消息
		</title><?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
	</head>
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>
		<div id="actionbar">
			<div class="container">
				<input type="button" name="add_message" value="发布消息" class="btn" id="add_message" />
			</div>
		</div>
		<div class="container">
			<div class="content">
				<?php echo validation_errors(); ?>
				<?php echo form_open('message/add') ?>
				<fieldset>
					<legend>发布新消息</legend>
					<div class="clearfix">
						<label for="message">消息：</label>
						<div class="input">
							<textarea class="xlarge" name="content" id="content" rows="4" site="140" value="<?php echo set_value('content'); ?>">
</textarea>
						</div>
					</div>
					<div class="clearfix">
						<label for="xlInput">地标：</label>
						<div class="input">
							<input class="xlarge" id="regions" name="regions" size="30" type="text" value="<?php echo set_value('regions'); ?>" />
						</div>
					</div>
					<div class="actions">
						<input type="submit" name="submit" value="添加" class="btn primary" id="submit" />
						<a href="/messages" class="btn" title="返回消息列表" >返回</a>
					</div>
				</fieldset>
				<?php echo form_close(); ?>
			</div>
			<div class="rightsidebar" style="border:1px solid #cccccc">
				cool;
			</div>
		</div>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/footer.php';  ?>
		<script type="text/javascript">
			yepnope({
				test: Modernizr.geolocation,
				yep : '/scripts/geo.js',
				nope: 'geo-polyfill.js',
				callback:function()
				{
					// if(geo_position_js.init()){
					// 						yepnope('/scripts/jquery.cookies.2.2.0.js');
					// 						geo_position_js.getCurrentPosition(success_callback,error_callback,{enableHighAccuracy:true,options:5000});
					// 					}
					// 					else{
					// 						alert("Functionality not available");
					// 					}
					// 
					// 					function success_callback(p)
					// 					{
					// 						var geoCookie = { latitude:p.coords.latitude.toFixed(5), longitude:p.coords.longitude.toFixed(5)};
					// 
					// 						$.cookies.set('user_geo', geoCookie);
					// 						alert('lat='+p.coords.latitude.toFixed(5)+';lon='+p.coords.longitude.toFixed(5));
					// 					}
					// 
					// 					function error_callback(p)
					// 					{
					// 						alert('error='+p.message);
					// 					}
				}

			});
		</script>
	</body>
</html>
