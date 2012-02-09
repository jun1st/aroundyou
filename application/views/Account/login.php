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
        <a href="<?php echo $code_url; ?>"><img src="/img/weibo_login.png" title="点击进入授权页面" alt="点击进入授权页面" border="0" /></a>
		<a href="/account/oauth/douban" title="DOUBAN">豆瓣</a>
    </div>
	<?php echo form_open('Account/Login', array('class'=>'form-horizontal')) ?>
	<fieldset id="login">
		<legend>登陆</legend>
		<div class="control-group">
			<label for> 邮 箱:</label>
			<div class="controls">
				<?php echo form_input(array('name'=>'email', 'size'=>'50', 'class'=>'xlarge')); ?>
			</div>
		</div>
		<div class="control-group">
			<label for> 密 码:</label>
			<div class="controls">
				<?php echo form_password(array('name'=>'password', 'size'=>'50', 'class'=>'xlarge', 'value'=>set_value('password'))); ?>
			</div>
		</div>
		<div class="control-group">
			<label for="rememberme"></label>
			<div class="controls">
				<input type="checkbox" name="remember_me" value="remember_me" id="remember_me" />
				<span>2周内不用登陆</span>
			</div>
		</div>
		<div class="control-group">
		<?php if (isset($login_error)) {
			echo "<label for='error'></label><div class='controls'><div class='form_error'><span>$login_error</span></div></div>";
		} ?>
		</div>
		<div class="form-actions">
			<input type='submit' name='submit' class="btn primary" value='登陆' />
			<a href="/user/register" class="btn" title="注册称为新拥护">注册新用户</a>
		</div>
	</fieldset>
	
	</form>
	</div>
</body>
</html>
