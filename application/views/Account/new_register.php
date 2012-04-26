<fieldset>
			<legend>注册新用户</legend>
			<?php if (isset($validation_fails)) : ?>
				<div class="control-group">
					<div class="alert alert-error">
						<?php echo validation_errors(); ?>
					</div>
				</div>
			<?php endif; ?>
			<div class='control-group'>
				<label class="control-label" for="name">用户名：</label>
				<div class='controls'>
					<?php echo form_input(array('name'=>'name', 'size'=>'50', 'value'=>set_value('name'))) ?>
				</div>
			</div>
			<div class='control-group'>
				<label class="control-label"  for="email">Email地址：</label>
				<div class='controls'>
					<?php echo form_input(array('name'=>'email', 'size'=>'50', 'value'=>set_value('email'))) ?>
				</div>
			</div>
			<div class='control-group'>
				<label class="control-label" for="password">密码：</label>
				<div class='controls'>
					<?php echo form_password(array('name'=>'password', 'size'=>'50', 'value'=>set_value('password'))) ?>
				</div>
			</div>
			<div class='control-group'>
				<label class="control-label"  for>确认密码：</label>
				<div class='controls'>
					<?php echo form_password(array('name'=>'passconf', 'size'=>'50', 'value'=>set_value('passconf'))) ?>
				</div>
			</div>
			
			<div class="form-actions">
				<button name="submit" type="submit" class="btn btn-primary">确认注册</button>
				<button type="reset" class="btn" value="取消" >取消</button>
			</div>
		</fieldset>

		