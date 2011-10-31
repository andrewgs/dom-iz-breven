<?php $this->load->view('admin_interface/head'); ?>
<body>
	<div id="container">
		<?php $this->load->view('admin_interface/header'); ?>
	    <div id="main" class="container_12 clearfix">
	    	<div class="grid_12">
				<hr size="2"/>
				<?php $this->load->view('admin_interface/project-list'); ?>
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
<script type="text/javascript">
	$(document).ready(function(){
		$(".btnDelete").click(function(){
			if(!confirm('Удалить проект?')) return false;
			var curID = $(this).attr("rID");
			var mesID = $("td[rID='"+curID+"']").text();
			$.post(
				"<?=$baseurl;?>admin/delete-project",
				{'id':mesID},
				function(data){
					if(data.status){
						$("tr[rID='"+curID+"']").fadeOut("slow",function(){
							$("tr[rID='"+curID+"']").remove();
							$.jGrowl("Проект удален!",{header:'Cписок проектов'});
						});
					}else
						$.jGrowl(data.message,{header:'Cписок проектов'});
				},"json");
		});
	});
</script>
</body>
</html>