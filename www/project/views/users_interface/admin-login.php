<?php $this->load->view('users_interface/head'); ?>
<body>
	<div id="container">
		<?php $this->load->view('users_interface/header'); ?>
	    <div id="main" class="container_12 clearfix">
	    	<div class="grid_12">
	    		<?php $this->load->view('forms/frmlogin');?>
	    	</div>
	    </div>
    <?php $this->load->view('users_interface/footer'); ?>
	</div> <!--! end of #container -->
	<?php $this->load->view('users_interface/scripts'); ?>
</body>
</html>