
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>register</title>
	
</head>

<body>

	<?php echo validation_errors(); ?>
	<?php echo form_open('user/register') ?>

	<h5>Username</h5>
	<?php echo form_input(array('name'=>'name', 'size'=>'50', 'value'=>set_value('name'))) ?>

	<h5>Password</h5>
	<?php echo form_password(array('name'=>'password', 'size'=>'50', 'value'=>set_value('password'))) ?>

	<h5>Password Confirm</h5>
	<?php echo form_password(array('name'=>'passconf', 'size'=>'50', 'value'=>set_value('passconf'))) ?>

	<h5>Email Address</h5>
	<?php echo form_input(array('name'=>'email', 'size'=>'50')) ?>


	<div><input name="submit" type="submit" value="Submit" /></div>

	</form>
	
</body>
</html>
