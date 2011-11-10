<div class="grid_12">
	<div class="block-separator"></div>
	<h2>Есть вопросы? Свяжитесь с нами!</h2>
</div>
<?= form_open('send-mail',array('id'=>'order-nameform','class'=>'example')); ?>
	<div class="grid_4">
		<ul id="order-form">
			<li><strong class="email-label">Ваше имя<em>*</em></strong></li>
			<li>
				<input name="name" id="name" class="inpval" value="<?=set_value('name');?>" type="text">
			</li>
			<li><strong class="email-label">Контактный телефон<em>*</em></strong></li>
			<li>
				<input value="<?=set_value('phone');?>" name="phone" class="inpval" id="phone" type="text">
			</li>
			<li><strong class="email-label">Email</strong></li>
			<li>
				<input name="email" id="email" value="<?=set_value('email');?>" type="text">
			</li>
		</ul>
	</div>
	<div class="grid_8">
		<ul id="order-form">
			<li><strong class="email-label">Комментарии</strong></li>
			<li>
				<textarea cols="60" rows="5" name="comments" id="comments" class="form-textarea resizable"><?=set_value('comments');?></textarea>
			</li>
			<li>
				<input name="submit" id="btn" value="Отправить" class="form-submit" type="submit">
			</li>					
		</ul>
	</div>
<?= form_close(); ?>