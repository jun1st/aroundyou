<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>
        发布新消息
    </title><?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/header.php'; ?>
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/topbar.php';  ?>
    <div id="actionbar">
        <div class="container">
            <input type="button" name="add_message" value="发布消息" class="btn" id="add_message" />
        </div>
    </div>
    <div class="container">
        <div class="content">
            <?php echo validation_errors(); ?>
            <?php 
                $hidden = array('id'=>$message->id);
                echo form_open("messages/edit/$message->id", '', $hidden)
            ?>
            <fieldset>
                <legend>发布新消息</legend>
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
                            value="<?php if (isset($regions)) {foreach ($regions as $region) { echo $region->region_name;}} ?>">
                        </input>
                    </div>
                </div>
                <div class="actions">
                    <input type="submit" name="submit" value="保存修改" class="btn primary" id="submit" />
                    <a href="/messages/view/" class="btn" title="返回消息列表" >取消</a>
                </div>
            </fieldset>
            <?php echo form_close(); ?>
        </div>
        <div class="rightsidebar" style="border:1px solid #cccccc">
            cool;
        </div>
    </div>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/application/views/footer.php';  ?>
</body>
</html>
