<fieldset id="register">
		<legend>设置你的邮箱地址</legend>
		<?php if (isset($validation_fails)) : ?>
			<div class="control-group">
				<div class="alert alert-error">
					<?php echo validation_errors(); ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="control-group">
			<label class="control-label" for="name"> 用户名:</label>
			<div class="controls">
				<?php echo form_input(array('name'=>'name', 'size'=>'50', 'placeholder'=>'你的用户名','value'=>set_value('name'))) ?>
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="email"> 邮 箱:</label>
			<div class="controls">
				<?php echo form_input(array('name'=>'email', 'size'=>'50', 'value'=>set_value('email'), 'placeholder'=>'邮箱地址')) ?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="rememberme"></label>
			<div class="controls">
				<label class="checkbox">
					<input type="checkbox" name="remember_me" value="remember_me" id="remember_me" />2周内不用登陆
				</label>
			</div>
		</div>
		<div class="form-actions">
			<button type='submit' name='submit' class="btn btn-primary" >登 陆</button>
		</div>
	</fieldset>