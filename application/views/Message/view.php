
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html>
<head>
	<title>View Message</title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>
	<div style="margin-top:40px; height:60px;">
		<div class="container">
			head lines;
			<?php echo uri_string(); ?>
		</div>
	</div>
	<div class="container">
		<div class="entry">
			<h3><?php echo $message->topic; ?></h3>
			<p><?php echo $message->user_name . " posted at " .$message->posted_time; ?>
			<div>
				<?php echo $message->content; ?>
			</div>
		</div>
		<div class="spacer"></div>
		<div id="comments" style="margin-top:20px; padding-top:20px;">
			<ul style="list-style:none;">
				<?php foreach ($comments as $comment): ?>
					<li style="margin-bottom:10px; border-bottom:1px solid #cccccc;">
						<div>
						<p><?php echo $comment->content; ?></p>
						<div>
							<?php echo $comment->user_name . ' posted at ' . $comment->posted_time; ?>
						</div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	
	<?php if ($this->session->userdata('is_login') == 'true') { ?>
		
	<?php echo form_open('message/comment', array('method'=>'post')); ?>
		<input type="hidden" name="message_id" value="<?php echo $message->message_id; ?>" />
		<h3>add your comment</h3>
		<p>
			<textarea name="comment_content" size="140" class="xxlarge" value='<?php set_value('comment_content'); ?>'></textarea>
		</p>
		<?php 
			$data = array(
				'name' =>'submit',
				'class'=>'btn primary',
				'value'=>'Add Comment',
			);
			echo form_submit($data); 
			echo form_close();
		?>
	<?php } else { ?>
		<a href="/login/<?php echo uri_string(); ?>" class="btn primary">登 陆</a>
	<?php } ?>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/footer.php';  ?>
</body>
</html>
