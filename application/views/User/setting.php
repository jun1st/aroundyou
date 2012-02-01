
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>修改<?php echo $user->name; ?>的个人信息</title>
	<link rel="stylesheet" href="/css/bootstrap.css" type="text/css" media="screen" title="no title" charset="utf-8">
	<link rel="stylesheet" href="/css/site.css" type="text/css" media="screen" title="no title" charset="utf-8">
	
	<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
	<link rel="stylesheet" href="/css/jquery.Jcrop.css" type="text/css" charset="utf-8" >
	// <script type="text/javascript" charset="utf-8" src="/scripts/jquery.min.js" ></script>
	<script type="text/javascript" charset="utf-8" src="/scripts/ajaxfileupload.js" ></script>
	<script type="text/javascript" charset="utf-8" src="/scripts/jquery.Jcrop.min.js" ></script>
</head>

<body>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>

<div class="container main">
	<div class="profile-sections">
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="#detail" data-toggle="pill">基本资料</a></li>
			<li><a href="#password" data-toggle="pill">密码设置</a></li>
			<li><a href="#image" data-toggle="pill">头像设置</a></li>
		</ul>
	</div>
	<div class="pill-content">
		<div id="detail" class="profiledetail pill-pane active">
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
						<input class="large" value="<?php echo $user->email; ?>" id="email" name="email" size="255" type="text" />
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
		<div id="password" class="pill-pane">
		</div>
		<div id="image" class="profile-imageupload pill-pane">
			<img id="profileImage" src="<?php echo $user->profile_image_path; ?>" title="profile image" />
			<br/>
			<input type="file" name="fileToUpload"  id="fileToUpload" />
			<button class="small btn" name="upload" id="upload" value="上传">上传</button>
		</div>
		</div>
</div>
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
