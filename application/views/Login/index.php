<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>登 陆</title>
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
	<?php echo form_open('login/index') ?>
	<fieldset id="login">
		<legend>Login</legend>
		<div class="clearfix">
			<label for> 邮 箱:</label>
			<div class="input">
				<?php echo form_input(array('name'=>'email', 'size'=>'50', 'class'=>'xlarge')); ?>
			</div>
		</div>
		<div class="clearfix">
			<label for> 密 码:</label>
			<div class="input">
				<?php echo form_password(array('name'=>'password', 'size'=>'50', 'class'=>'xlarge', 'value'=>set_value('password'))); ?>
			</div>
		</div>
		<div class="clearfix">
			<label for="rememberme"></label>
			<div class="input">
				<input type="checkbox" name="remember_me" value="remember_me" id="remember_me" />
				<span>2周内不用登陆</span>
			</div>
		</div>
		<div class="actions">
			<input type='submit' name='submit' class="btn primary" value='登陆' />
			<a href="/user/register" class="btn" title="注册称为新拥护">注册新用户</a>
		</div>
	</fieldset>
	
	</form>
	</div>
</body>
</html>
