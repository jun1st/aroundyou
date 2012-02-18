
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>修改<?php echo $user->name; ?>的个人信息</title>
	
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
	<link rel="stylesheet" href="/css/jquery.Jcrop.css" type="text/css" charset="utf-8" >

</head>

<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>

<div class="container">
	<div class="tabbable tabs-left">
		<ul id="user-setting-navs" class="nav nav-tabs span3" style="height:400px;">
			<li class="active" style="margin-top:20px;"><a href="#detail" data-toggle="tab">基本资料</a></li>
			<li><a href="#password" data-toggle="tab">密码设置</a></li>
			<li><a href="#image" data-toggle="tab">头像设置</a></li>
		</ul>
		<div class="tab-content span8">
			<div id="detail" class="tab-pane active">
				<?php echo form_open('user/setting', array('class'=>'form-horizontal')); ?>
				<fieldset>
					<legend>个人信息</legend>
					<div class='control-group'>
						<label for>名字：</label>
						<div class='controls'>
							<input class="large" value="<?php echo $user->name; ?>" id="name" name="name" size="255" type="text" />
						</div>
					</div>
					<div class='control-group'>
						<label for>Email地址：</label>
						<div class='controls'>
							<input class="input-large disabled" value="<?php echo $user->email; ?>" id="email" name="email" size="255" type="text" disabled />
						</div>
					</div>
					<div class='control-group'>
						<label for>生日：</label>
						<div class='controls'>
							<input class="large" value="<?php echo $user->birthday; ?>" id="birthday" name="birthday" size="255" type="text" />
						</div>
					</div>
					<div class='control-group'>
						<label for>个人网站：</label>
						<div class='controls'>
							<input class="large" value="<?php echo $user->website; ?>" id="website" name="website" size="255" type="text" />
						</div>
					</div>
					<div class='control-group'>
						<label for>所在城市：</label>
						<div class='controls'>
							<input class="large" value="<?php echo $user->location; ?>" id="location" name="location" size="255" type="text" />
						</div>
					</div>
					<div class='control-group'>
						<label for>简介：</label>
						<div class='controls'>
							<textarea class="xlarge" value="<?php echo $user->description; ?>" rows="4" id="description" name="description" size="255" ><?php echo $user->description; ?></textarea>
						</div>
					</div>
					<div class="form-actions">
						<button name="submit" type="submit" class="btn primary" value="修改" >修改</button>
						<button type="reset" class="btn" value="取消" >取消</button>
					</div>
				</fieldset>
				<?php echo form_close(); ?>
			</div>
			<div id="password" class="tab-pane">
				<?php echo form_open('user/setting/password', array('class'=>'form-horizontal')); ?>
				<fieldset>
					<legend>修改密码</legend>
					<?php echo validation_errors(); ?>
					<div class="control-group">
						<label class="control-label" for="old">
							旧密码:
						</label>
						<div class="controls">
							<input type="password" name="old" value="<?php echo set_value('old'); ?>" id="old">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="new">
							新密码:
						</label>
						<div class="controls">
							<input type="password" name="new" value="<?php echo set_value('new'); ?>" id="old">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="confirm">
							确认新密码:
						</label>
						<div class="controls">
							<input type="password" name="confirm" value="<?php echo set_value('confirm'); ?>" id="old">
						</div>
					</div>
					<div class="form-actions">
						<button type="submit" class="btn btn-primary" name="submit" value="change">确认修改</button>
					</div>
				</fieldset>
				<?php echo form_close(); ?>
			</div>
			<div id="image" class="tab-pane">
				<?php if(empty($user->profile_image_path)): ?>
					<img title="profile image" style="border:4px #ccc solid;" src="/img/default.jpeg"/>
				<?php else: ?>
					<img title="profile image" style="border:4px #ccc solid;" src="<?php echo $user->profile_image_path; ?>"/>
				<?php endif; ?>
				<br/>
				<input type="file" name="fileToUpload"  id="fileToUpload" />
				<br/>
				<button class="btn btn-primary" name="upload" id="upload" value="上传">上传</button>
			</div>
	</div>
</div>
<script type="text/javascript" src="/scripts/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8">
function ajaxFileUpload()
{ 
	$.ajaxFileUpload
	(
		{
			url:'/user/upload', 
			secureuri:false,
			fileElementId:'fileToUpload',
			dataType: 'json',
			success: function (data, status)
			{
				alert(data.error_message);
				$('#profileImage').attr('src', data.image_address);
				if(typeof(data.error) != 'undefined')
				{
					if(data.error != '')
					{
						alert(data.error);
					}
					else
					{
						alert(data.msg);
					}
				}
			},
			error: function (data, status, e)
			{
				alert(e);
			}
			
		}
	);
	return false;
}

	$(document).ready(function()
		{
			$('#upload').click(
				function()
				{
					ajaxFileUpload();
				}
			);
		});
	</script>
</script>
</body>
</html>
