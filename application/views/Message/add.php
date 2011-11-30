<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>add</title>
	
</head>

<body>

	<?php echo validation_errors(); ?>
	<?php echo form_open('message/add') ?>

	<h5>Topic</h5>
	<?php echo form_input(array('name'=>'topic', 'size'=>'50', 'value'=>set_value('topic'))) ?>


	<h5>Content</h5>
	<?php echo form_input(array('name'=>'content', 'size'=>'140', 'value'=>set_value('content'))) ?>


	<div><input name="submit" type="submit" value="Submit" /></div>

	</form>
</body>
</html>
