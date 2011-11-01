<?= form_open($this->uri->uri_string(),array('id'=>'order-nameform','class'=>'example')); ?>
	<br/>
	<div class="form-login">
		<strong class="email-label">Логин:<em>*</em></strong>
		<input class="text-form-input" type="text" name="login-name" value="" />
		<div class="clear"></div>
		<strong class="email-label">Пароль:<em>*</em></strong>
		<input class="text-form-input" type="password" name="login-pass" value="" />
		<div class="clear"></div><br/>
		<input name="submit" id="btn" value="Вход" class="form-submit" type="submit">
	</div>
	<div class="clear"></div>
<?= form_close(); ?>