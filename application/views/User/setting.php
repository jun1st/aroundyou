
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>setting</title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
</head>

<body>

	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>
	<div style="margin-top:40px; height:60px;">
		<div class="container">
			head lines;
		</div>
	</div>
	<div class="container">
		<?php echo form_open('user/setting'); ?>
			<fieldset id="profile_setting" class="">
				<legend>profile setting</legend>
				<div class='clearfix'>
					<label for>名字：</label>
					<div class='input'>
						<input class="large" value="<?php echo $user->name; ?>" id="name" name="name" size="255" type="text">
					</div>
				</div>
				<div class='clearfix'>
					<label for>Email地址：</label>
					<div class='input'>
						<input class="large" value="<?php echo $user->email; ?>" id="email" name="email" size="255" type="text">
					</div>
				</div>
				<div class='clearfix'>
					<label for>生日：</label>
					<div class='input'>
						<input class="large" value="<?php echo $user->birthday; ?>" id="birthday" name="birthday" size="255" type="text">
					</div>
				</div>
				<div class='clearfix'>
					<label for>个人网站：</label>
					<div class='input'>
						<input class="large" value="<?php echo $user->website; ?>" id="website" name="website" size="255" type="text">
					</div>
				</div>
				<div class='clearfix'>
					<label for>所在城市：</label>
					<div class='input'>
						<input class="large" value="<?php echo $user->location; ?>" id="location" name="location" size="255" type="text">
					</div>
				</div>
				<div class="actions">
					<button type="submit" class="btn primary" value="修改" >修改</button>
					<button type="reset" class="btn" value="取消" >取消</button>
				</div>
			</fieldset>
		<?php echo form_close(); ?>
	</div>
</body>
</html>
