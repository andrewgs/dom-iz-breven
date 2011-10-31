<?php $this->load->view('users_interface/head'); ?>
<body>
	<div id="container">
		<?php $this->load->view('users_interface/header'); ?>
	    <div id="main" class="container_12 clearfix">
	    	<div class="grid_12">
	    		<h1><?=$pagetitle;?></h1>
	    	</div>
		<?php for($i=0;$i<count($projects);$i++):?>
	    	<div class="grid_3">
	    		<a class="project" href="<?=$baseurl.$this->uri->segment(1)?>/proekt-db-<?=$projects[$i]['id'];?>">
					<img alt="Проект дома из бревна ДБ-<?=$projects[$i]['id'];?>" height="130" width="170" src="<?=$baseurl;?>/viewimage/<?=$projects[$i]['id'];?>">
				</a>
	    		<div class="project-desc">
					<a href="<?=$baseurl.$this->uri->segment(1)?>/proekt-db-<?=$projects[$i]['id'];?>" class="green-link">
						Проект дома из бревна ДБ-<?=$projects[$i]['id'];?><br>(<?=$projects[$i]['square'];?> м<sup>2</sup>)
					</a>
				</div>
	    	</div>
		<?php endfor; ?>
	    </div>
    	<?php $this->load->view('users_interface/footer'); ?>
	</div> <!--! end of #container -->
	<?php $this->load->view('users_interface/scripts'); ?>
</body>
</html>