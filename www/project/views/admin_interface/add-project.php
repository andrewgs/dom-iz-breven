<?php $this->load->view('admin_interface/head'); ?>
<body>
	<div id="container">
		<?php $this->load->view('admin_interface/header'); ?>
	     <div id="main" class="container_12 clearfix">
	    	<div class="grid_12">
				<?php $this->load->view('forms/frmaddproject'); ?>
				<div class="clear"></div>
	    	</div>
	    </div>
	</div> <!--! end of #container -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?=$baseurl;?>js/libs/jquery-1.6.2.min.js"><\/script>')</script>
<!-- scripts concatenated and minified via ant build script-->
<script defer src="<?=$baseurl;?>js/plugins.js"></script>
<script defer src="<?=$baseurl;?>js/script.js"></script>
<script defer src="<?=$baseurl;?>js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="<?=$baseurl;?>js/redactor/redactor.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	
		$('#text').redactor({toolbar:'mini',css:['blank.css']});
		
		<?php if($msg):?>
			$.jGrowl(<?=$msg;?>,{header:'Сообщение'});
		<?php endif;?>
	
		$(".digital").keypress(function(e){
			if($(this).val() == '' && e.which == 48) return false;
			if(e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)){return false;}
			if($(this).val().length > 3) {$(this).val('')}
		});
		$("#btn").click(function(event){
			if(!confirm('Добавить новый проект?')) return false;
			var err = false;
			$(".inpval").css('border-color','#C0C0C0 #D9D9D9 #D9D9D9');
			$(".inpval").each(function(i,element){if($(this).val()===''){$(this).css('border-color','#FF0000');err = true;}});
			if(err){
				event.preventDefault();
				$.jGrowl("Пропущены обязательные поля!",{header:'Форма добавления проекта'});
			}
		});
	});
</script>
</body>
</html>