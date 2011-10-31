<?php $this->load->view('users_interface/head'); ?>
<body>
	<div id="container">
		<?php $this->load->view('users_interface/header'); ?>
	    <div id="main" class="container_12 clearfix">
	    	<div class="grid_12">
	    		<h1><?=$pagetitle;?></h1>
	    		<h3><?=anchor($backpath,'Вернуться назад');?></h3>
	    	</div>
	    	<div class="grid_6">
	    		<div class="project-adv">
	    			<img alt="Дом из оцилиндрованного бревна ДБ-<?=$project['id']?>, <?=$project['square']?>м2" src="<?=$baseurl;?>/viewimage/<?=$project['id'];?>">
	    		</div>
	    		
	    	</div>
	    	<div class="grid_6">
	    		<div class="project-adv">
	    			<img alt="Схема проекта дома из оцилиндрованного бревна ДБ-<?=$project['id']?>" src="<?=$baseurl;?>/viewshema/<?=$project['id'];?>">
	    		</div>
	    		<p class="home-parameters">
	    			<?=$project['text']?>
	    		</p>
	    	</div>
			<div class="clear"></div>
			<?php $this->load->view('forms/frmsendmail'); ?>
	    </div>
    <?php $this->load->view('users_interface/footer'); ?>
	</div> <!--! end of #container -->
	<?php $this->load->view('users_interface/scripts'); ?>
</body>
</html>