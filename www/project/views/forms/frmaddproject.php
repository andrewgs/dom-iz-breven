<?=form_open_multipart($this->uri->uri_string(),array('id'=>'order-nameform','class'=>'example')); ?>
	<hr size="2"/>
	<div class="grid_4">
		<ul id="order-form">
			<li><strong class="email-label">Изображение<em>*</em></strong></li>
			<li>
				<input class="inpval" type="file" id="userfile1" name="userfile1" size="32" />
			</li>
			<li><strong class="email-label">Схема<em>*</em></strong></li>
			<li>
				<input class="inpval" type="file" id="userfile2" name="userfile2" size="32" />
			</li>
			<li><strong class="email-label">Плошадь, м<sup>2</sup></strong></li>
			<li>
				<input name="square" id="square" class="inpval digital" value="<?=set_value('square');?>" type="text" style="width:80px;">
			</li>
		</ul>
	</div>
	<div class="grid_6">
		<ul id="order-form">
			<li><strong class="email-label">Описание</strong></li>
			<li>
				<textarea cols="80" rows="4" name="text" id="text" class="form-textarea inpval"><?=set_value('text');?></textarea>
			</li>
		</ul>
	</div>
	<div class="clear"></div>
	<hr size="2"/>
	<div class="grid_4">
		<input name="submit" id="btn" value="Добавить" class="form-submit" type="submit">
	</div>
<?= form_close(); ?>