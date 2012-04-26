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
    
	<?php echo form_open('account/register', array('class'=>'form-horizontal')) ?>
	
	<?php if($is_oauth): ?>
		<?php include 'oauth_register.php'; ?>
	<?php else:  ?>
		<?php include 'new_register.php'; ?>
	<?php endif; ?>
	
	</form>
	</div>
</body>
</html>
