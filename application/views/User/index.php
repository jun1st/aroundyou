<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>index</title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>
	<div style="margin-top:40px; height:60px;">
		<div class="container">
			<input type="button" name="add_message" value="发布消息" class="btn large" id="add_message">
		</div>
	</div>
		<div class="container">
	<table>
	<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo $user->id; ?></td>
			<td><?php echo $user->name; ?></td>
			<td><?php echo $user->email; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
	</div>
</body>
</html>
