<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>登 陆</title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>
	
	<div class="container main">
    <div>
		<form class="form-horizontal">
			<legend>通过第三方登陆</legend>
			<div class="control-group">
				<div class="controls">
					<a href="/account/oauth/sina"><img src="/img/weibo-login.png" title="点击进入授权页面" alt="点击进入授权页面" border="0" /></a>
				</div>
			</div>
			<div class="control-group">
				<div class="controls">
					<a href="/account/oauth/douban" title="DOUBAN"><img src="/img/douban-login.png" title="点击进入授权页面" alt="点击进入授权页面" border="0" /></a>
				</div>
			</div>			
		</form>
    </div>
	<?php echo form_open('Account/Login', array('class'=>'form-horizontal')) ?>
	<fieldset id="login">
		<legend>登陆</legend>
		<?php if (isset($validation_fails)) : ?>
			<div class="control-group">
				<div class="alert alert-error">
					<?php echo validation_errors(); ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="control-group">
			<label for="email" class="control-label"> 邮 箱:</label>
			<div class="controls">
				<?php echo form_input(array('name'=>'email', 'size'=>'50', 'class'=>'xlarge')); ?>
			</div>
		</div>
		<div class="control-group">
			<label for="email"  class="control-label"> 密 码:</label>
			<div class="controls">
				<?php echo form_password(array('name'=>'password', 'size'=>'50', 'class'=>'xlarge', 'value'=>set_value('password'))); ?>
			</div>
		</div>
		<div class="control-group">
			<label for="rememberme"></label>
			<div class="controls">
				<label class="checkbox" for="remember_me">
				<input type="checkbox" name="remember_me" value="remember_me" id="remember_me" />
				2周内不用登陆</label>
			</div>
		</div>
		<div class="control-group">
		<?php if (isset($login_error)) {
			echo "<label for='error'></label><div class='controls'><div class='form_error'><span>$login_error</span></div></div>";
		} ?>
		</div>
		<div class="form-actions">
			<button type='submit' name='submit' class="btn btn-primary" value='submit'>登 陆</button>
			<a href="/user/register" class="btn" title="注册为新拥护">注册新用户</a>
		</div>
	</fieldset>
	
	</form>
	</div>
</body>
</html>
