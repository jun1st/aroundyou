<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>index</title>
	
</head>

<body>
	<table>
	<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo $user->id; ?></td>
			<td><?php echo $user->name; ?></td>
			<td><?php echo $user->email; ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
</body>
</html>
