
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html>
<head>
	<title><?php echo $message->content; ?></title>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
</head>

<body>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>

	<div class="container">
        <div class="span8 pull-left">
        		<div class="entry">
        			<div class="tags">
        				<a href="/byregion?name=<?php echo $message->region_name; ?>" class="region_tag"><?php echo $message->region_name; ?></a>
        			</div>
        			<p class="message">
        				<?php echo $message->content; ?>	
        				<?php if ($this->session->userdata('is_login') && $message->user_id == $this->session->userdata['user']->id) {
        					echo "<a href='/messages/edit/$message->message_id' title='编辑' class='edit_link'>编辑</a>";
        				} ?>			
        			</p>
        			<div class="user">
        				<h3>
        				<?php echo "<a href=/users/$message->user_id title='查看$message->user_name 的信息' >$message->user_name</a>"; ?><strong><span class="description"><?php echo $message->user_description; ?></span></strong>
        				</h3>
						<span class="time"><?php echo  "发布于: " .relative_time($message->posted_time); ?></span>
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
        								<a href="/users/<?php echo $comment->user_id; ?>" title="查看<?php echo $comment->user_name; ?>的信息" >
        								<img src="<?php echo $comment->profile_image; ?>" alt="profile" title="<?php echo $comment->user_name; ?>" />	
        								</a>
        								<h3>
        								<?php echo "<a href=/users/$comment->user_id title='查看$comment->user_name 的信息' >$comment->user_name</a>"; ?>
        								<strong><span class="description"><?php echo $message->user_description; ?></span></strong>
        								</h3>
        							</div>
        						<p><?php echo decode($comment->content); ?></p>
        						<div class='author'>
        							<?php echo '发布于 ' . relative_time($comment->posted_time); ?>
        						</div>
        						</div>
        					</li>
        				<?php endforeach; ?>
        			</ul>
        		</div>
	
        	<?php if ($this->session->userdata('is_login') == 'true') { ?>
		
        	<?php echo form_open('message/comment', array('method'=>'post', 'class'=>'well')); ?>
        		<input type="hidden" name="message_id" value="<?php echo $message->message_id; ?>" />
        		<label><em>发表你的评论</em></label>
        		<textarea name="comment_content" class="span5" value='<?php set_value('comment_content'); ?>'></textarea>
				<br/>
        		<?php 
        			$data = array(
        				'name' =>'submit',
        				'class'=>'btn btn-primary',
        				'value'=>'发表',
        			);
        			echo form_submit($data); 
        			echo form_close();
        		?>
        	<?php } else { ?>
                <div>
                    <span>请<a href="/account/login?returnUrl=<?php echo uri_string(); ?>">登陆</a>后再发表评论</span>
                </div>
        		
        	<?php } ?>
            
        </div>
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/Message/message_view_sidebar.php';  ?>
	</div>
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/footer.php';  ?>
</body>
</html>
