<?php $this->load->view('users_interface/head'); ?>
<body>
	<div id="container">
		<?php $this->load->view('users_interface/header'); ?>
	    <div id="main" class="container_12 clearfix">
	    	<div class="grid_12">
	    		<h1>Проекты</h1>
	    		<p>
					В данном разделе представлены проекты в базовой комплектации и планировке.Мы всегда готовы 
					разработать для вас индивидуальный проект дома, опираясь на ваши пожелания и предпочтения, в том 
					числе возможно изменение высоты этажа и строительства по вашему проекту. Проектная документация 
					составляется при помощи современных компьютерных программ, позволяющих увидеть дом в объеме<br/> как 
					снаружи, так и изнутри.
				</p>
			</div>
			<div class="grid_12">
				<blockquote>
					<p class="margin">
		    			Выбор проекта вашего будущего дома ответственный и важный момент. Необходимо руководствоваться 
		    			не только внешней привлекательностью дома, но и такими характеристиками как комфорт и безопасность. 
		    			Без необходимого опыта и знаний составить или выбрать подходящий вам проект самостоятельно довольно 
		    			трудно, поэтому при выборе проекта необходимо руководствоваться мнением специалистов.
		    		</p>
	    		</blockquote>
	    		<p>
	    			Мы строим деревянные дома из оцилиндрованного бревна, а также загородные дома, беседки, храмы, рестораны,
	    			гостинничные комплексы и другие малые архитектурные формы. Компания Зеленый Дом также занимается обустройством 
	    			дестких площадок. Мы собираем современные, экологичные детские игровые площадки из дерева, соответствующие самым 
	    			строгим требованиям безопасности.  
	    		</p>
	    	</div>
	    	<div class="grid_12 block-separator"></div>
	    	<div class="grid_3">
	    		<a class="project" href="<?=$baseurl;?>proekti-derevyannih-domov-do-100m2"><img alt="Дом из оцилиндрованного бревна" src="<?=$baseurl;?>img/projects/db_1.jpg"></a>
	    		<div class="project-desc"><a href="<?=$baseurl;?>proekti-derevyannih-domov-do-100m2" class="green-link">Проекты деревянных домов до <strong>100 м<sup>2</sup></strong></a></div>
	    	</div>
	    	<div class="grid_3">
	    		<a class="project" href="proekti-derevyannih-domov-ot-100m2-do-200m2"><img alt="Дом из оцилиндрованного бревна" src="<?=$baseurl;?>img/projects/db_2.jpg"></a>
	    		<div class="project-desc"><a href="<?=$baseurl;?>proekti-derevyannih-domov-ot-100m2-do-200m2" class="green-link">Проекты деревянных домов от <strong>100</strong> до <strong>200 м<sup>2</sup></strong></a></div>
	    	</div>
	    	<div class="grid_3">
	    		<a class="project" href="proekti-derevyannih-domov-ot-200m2-do-300m2"><img alt="Дом из оцилиндрованного бревна" src="<?=$baseurl;?>img/projects/db_3.jpg"></a>
	    		<div class="project-desc"><a href="<?=$baseurl;?>proekti-derevyannih-domov-ot-200m2-do-300m2" class="green-link">Проекты деревянных домов от <strong>200</strong> до <strong>300 м<sup>2</sup></strong></a></div>
	    	</div>
	    	<div class="grid_3">
				<a class="project" href="<?=$baseurl;?>proekti-derevyannih-domov-ot-300m2"><img alt="Дом из оцилиндрованного бревна" src="<?=$baseurl;?>img/projects/db_4.jpg"></a>
	    		<div class="project-desc"><a href="<?=$baseurl;?>proekti-derevyannih-domov-ot-300m2" class="green-link">Проекты деревянных домов свыше <strong>300 м<sup>2</sup></strong></a></div>
	    	</div>
	    </div>
		<?php $this->load->view('users_interface/footer'); ?>
	</div> <!--! end of #container -->
	<?php $this->load->view('users_interface/scripts'); ?>
</body>
</html>