
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html>
<head>
	<title><?php echo $message->content; ?></title>
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
		<div class="entry">
			<!-- <h2><?php echo $message->topic; ?></h2>
						<div class="user">
							<a href="/users/<?php echo $message->user_id; ?>" title="查看<?php echo $message->user_name; ?>的信息" >
							<img src="<?php echo $message->user_profile_image; ?>" alt="profile" title="<?php echo $message->user_name; ?>" />	
							</a>
							<h3>
							<?php echo "<a href=/users/$message->user_id title='查看$message->user_name 的信息' >$message->user_name</a>"; ?>
							<strong><span class="description"><?php echo $message->user_description; ?></span></strong>
							</h3>
						</div> -->
			<p class="message">
				<?php echo $message->content; ?>	
				<?php if ($message->user_id == $this->session->userdata['user']->id) {
					echo "<a href='/messages/edit/$message->message_id' title='编辑' class='edit_link'>编辑</a>";
				} ?>			
			</p>
			<div class="tags">
				<a href="/byregion?name=<?php echo $message->region_name; ?>" class="region_tag"><?php echo $message->region_name; ?></a>
			</div>
			<div class="user">
				<h3>
				<?php echo "<a href=/users/$message->user_id title='查看$message->user_name 的信息' >$message->user_name</a>"; ?><strong><span class="description"><?php echo $message->user_description; ?></span></strong>
				</h3>
				<span class="time"><?php echo  "发布于: " .relativeTime($message->posted_time); ?></span>
			</div>
			<div class="action">
				<a href="#comments" name="addcomment">发表评论</a>
				<span class="delimiter">•</span>
				<a href="#comments" name="addcomment">举报</a>
			</div>
		</div>
		<div class="spacer"></div>
		<div id="comments">
			<ul>
				<?php foreach ($comments as $comment): ?>
					<li style="margin-bottom:10px; border-bottom:1px solid #cccccc;">
						<div>
							<div class="user">
								<a href="/users/<?php echo $comment->user_name; ?>" title="查看<?php echo $comment->user_name; ?>的信息" >
								<img src="<?php echo $message->user_profile_image; ?>" alt="profile" title="<?php echo $comment->user_name; ?>" />	
								</a>
								<h3>
								<?php echo "<a href=/users/$comment->user_name title='查看$comment->user_name 的信息' >$comment->user_name</a>"; ?>
								<strong><span class="description"><?php echo $message->user_description; ?></span></strong>
								</h3>
							</div>
						<p><?php echo decode($comment->content); ?></p>
						<div class='author'>
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
		<h3>发表你的评论</h3>
		<p>
			<textarea name="comment_content" size="140" rows="4" class="xxlarge" value='<?php set_value('comment_content'); ?>'></textarea>
		</p>
		<?php 
			$data = array(
				'name' =>'submit',
				'class'=>'btn primary',
				'value'=>'发表',
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
