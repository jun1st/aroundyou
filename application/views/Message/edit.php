<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>
        修改消息
    </title><?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>
    
    <div class="container main">
        <div class="content">
            <?php echo validation_errors(); ?>
            <?php 
                $hidden = array('id'=>$message->message_id);
                echo form_open("messages/edit/$message->message_id", '', $hidden)
            ?>
            <fieldset>
                <legend>修改消息</legend>
                <div class="clearfix">
                    <label for="message">消息：</label>
                    <div class="input">
                        <textarea class="xlarge" name="content" id="content" rows="4" site="140"><?php echo $message->content; ?>
                        </textarea>
                    </div>
                </div>
                <div class="clearfix">
                    <label for="xlInput">地标：</label>
                    <div class="input">
                        <input class="xlarge" id="regions" name="regions" size="30" type="text"
						value="<?php echo $message->region_name; ?>">
                        </input>
                    </div>
                </div>
                <div class="actions">
                    <input type="submit" name="submit" value="保存修改" class="btn primary" id="submit" />
                    <a href="/message/view/<?php echo $message->message_id ?>" class="btn" title="返回消息列表" >取消</a>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
        </div>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/Message/message_view_sidebar.php';  ?>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/footer.php';  ?>
</body>
</html>
