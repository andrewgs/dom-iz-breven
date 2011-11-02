<?php $this->load->view('users_interface/head'); ?>
<body>
	<div id="container">
		<?php $this->load->view('users_interface/header'); ?>
	    <div id="main" class="container_12 clearfix">
	    	<div class="grid_12">
		    	<?=anchor($backpath,'&laquo; Вернуться назад', array('class'=>'green-link'));?>
	    		<h1><?=$pagetitle;?></h1>
	    	</div>
	    	<div class="grid_6">
	    		<div class="project-adv gallery">
					<a href="<?=$baseurl;?>viewimage/<?=$project['id'];?>" rel="prettyPhoto" title="Дом из оцилиндрованного бревна ДБ-<?=$project['id']?>, <?=$project['square']?>м2"><img alt="Дом из оцилиндрованного бревна ДБ-<?=$project['id']?>, <?=$project['square']?>м2" src="<?=$baseurl;?>viewimage/<?=$project['id'];?>"></a>
	    		</div>
	    	</div>
	    	<div class="grid_6">
	    		<div class="project-adv gallery">
					<a href="<?=$baseurl;?>viewshema/<?=$project['id'];?>" rel="prettyPhoto" title="Схема проекта дома из оцилиндрованного бревна ДБ-<?=$project['id']?>"><img alt="Схема проекта дома из оцилиндрованного бревна ДБ-<?=$project['id']?>" src="<?=$baseurl;?>viewshema/<?=$project['id'];?>"></a>
	    		</div>
	    		<p class="home-parameters">
	    			<?=$project['text']?>
	    		</p>
	    		<p><strong>Стоимость</strong>: <?=$project['price'];?> руб.</p>
	    	</div>
			<div class="clear"></div>
			<?php $this->load->view('forms/frmsendmail'); ?>
	    </div>
    <?php $this->load->view('users_interface/footer'); ?>
	</div> <!--! end of #container -->
	<?php $this->load->view('users_interface/scripts'); ?>
</body>
</html>