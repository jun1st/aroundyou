
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>注册新用户</title>
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
		<?php echo form_open('user/register') ?>
		<fieldset id="profile_setting" class="">
			<legend>注册新用户</legend>
			<div class='clearfix'>
				<label for="name">用户名：</label>
				<div class='input'>
					<?php echo form_input(array('name'=>'name', 'size'=>'50', 'value'=>set_value('name'))) ?>
					<?php echo form_error('name'); ?>
				</div>
			</div>
			<div class='clearfix'>
				<label for="email">Email地址：</label>
				<div class='input'>
					<?php echo form_input(array('name'=>'email', 'size'=>'50', 'value'=>set_value('email'))) ?>
					<?php echo form_error('email'); ?>
				</div>
			</div>
			<div class='clearfix'>
				<label for="password">密码：</label>
				<div class='input'>
					<?php echo form_password(array('name'=>'password', 'size'=>'50', 'value'=>set_value('password'))) ?>
					<?php echo form_error('password'); ?>
				</div>
			</div>
			<div class='clearfix'>
				<label for>确认密码：</label>
				<div class='input'>
					<?php echo form_password(array('name'=>'passconf', 'size'=>'50', 'value'=>set_value('passconf'))) ?>
					<?php echo form_error('passconf'); ?>
				</div>
			</div>
			
			<div class="actions">
				<button name="submit" type="submit" class="btn primary">确认注册</button>
				<button type="reset" class="btn" value="取消" >取消</button>
			</div>
		</fieldset>
	</form>
	
</body>
</html>
