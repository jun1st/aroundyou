<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>设置你的邮箱地址</title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>
	
	<div class="container main">
    
	<?php echo form_open('Account/Register') ?>
	<fieldset id="register">
		<legend>设置你的邮箱地址</legend>
		<div class="clearfix">
			<label for> 邮 箱:</label>
			<div class="input">
				<?php echo form_input(array('name'=>'email', 'size'=>'50', 'class'=>'xlarge')); ?>
			</div>
		</div>
		<div class="clearfix">
			<label for="rememberme"></label>
			<div class="input">
				<input type="checkbox" name="remember_me" value="remember_me" id="remember_me" />
				<span>2周内不用登陆</span>
			</div>
		</div>
		<div class="clearfix">
		<?php if (isset($login_error)) {
			echo "<label for='error'></label><div class='input'><div class='form_error'><span>$login_error</span></div></div>";
		} ?>
		</div>
		<div class="actions">
			<input type='submit' name='submit' class="btn primary" value='登陆' />
		</div>
	</fieldset>
	
	</form>
	</div>
</body>
</html>
