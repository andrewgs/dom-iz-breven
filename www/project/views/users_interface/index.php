<?php $this->load->view('users_interface/head'); ?>
<body>
	<div id="container">
	<?php $this->load->view('users_interface/header'); ?>
		<div id="main" class="container_12 clearfix">
			<div class="grid_12">
				<div class="slider">
					<div class="slides">
						<!--img src="<?=$baseurl;?>img/slide-1.jpg" alt="Мы продолжаем традицию строительства деревянных домов, дополнив ее современными технологиями" /-->
					</div>
				</div>
			</div>
			<div class="grid_12">
				<p>Зеленый Дом - одна из ведущих строительных компаний по возведению деревянных домов 
				на юге России. Мы проектируем и строим современные экологичные, удобные и уютные <strong>дома 
				из оцилиндрованного бревна</strong>. Главной отличительной чертой нашей компании является тот
				факт, что для строительства домов использует только древесина из северных районов Кировской области,
				которая является идеальным строительным материалом для деревянного дома.</p>
				<p>Мы уделяем особое внимание выборы исходного сырья. В процессе производства оцилиндрованного бревна
				используются <strong>современные станки токарного типа</strong>, которые позволяют нам гарантировать
				постоянство размеров и гладкость поверхности используемых нами бревен.</p>
				<p>Наши архитекторы создают для каждого клиента уникальные <strong>проекты деревянных домов</strong>,
				опираясь на многолетний опыт деревянного домостроения. Все проекты разрабатываются с учетом требований
				клиентов по планировке внутреннего пространства, наличию коммуникаций, комфорту и эстетике.</p>
				<p>В чем же заключается преимущество домов из оцилиндрованного бревна? Бревенчатые дома имеют очень 
				привлекательный вид и не требуют дополнительный отделочных работ. Деревянные дома долговечны, экологичны, 
				обладают прекрасной звуко- и теплоизоляцией, способностью обеспечивать благоприятный климат внутри помещений. 
				Именно поэтому все большее количество людей хотят жить в доме, построенном из натурального дерева вдали от
				городской суеты. Ваша мечта может воплотиться в реальность с постройкой собственного загородного дома из
				оцилиндрованного бревна.</p>
			</div>
			<div class="grid_12 block-separator"></div>
		</div>
		<div class="container_12 clearfix">
			<div class="grid_12">
				<h2>Наши приемущества</h2>
			</div>
			<div class="grid_1">
				<img src="<?=$baseurl;?>img/benefits-icon-1.png"/ alt="Кировский лес">
	    	</div>
	    	<div class="grid_3">
	    		<h3>Кировский лес</h3>
	    		<p>Мы используем "зимний" лес из северного района Кировской области и 
	    		являемся официальным дилером ООО КСВ г.Киров</p>
	    	</div>
	    	<div class="grid_1">
	    		<img src="<?=$baseurl;?>img/benefits-icon-2.png"/ alt="Кировский лес">
	    	</div>
	    	<div class="grid_3">
	    		<h3>Как мы строим</h3>
	    		<p>Совершенство состоит из идеальных мелочей. Мы обеспечиваем высокое качество и использование самых современных технологий.</p>
	    	</div>
	    	<div class="grid_1">
	    		<img src="<?=$baseurl;?>img/benefits-icon-3.png"/ alt="Кировский лес">
	    	</div>
	    	<div class="grid_3">
	    		<h3>Ваша выгода</h3>
	    		<p>Мы предлагаем скидки за объем до 30%. Строительство дома является 
	    		идеальным способом инвестировать в свое будущее и сохранить ваши сбережения.</p>
	    	</div>
	    	<div class="grid_12 block-separator"></div>
	    </div>
		<div class="container_12 clearfix">
	    	<div class="grid_12">
		    	<h2>Проекты домов</h2>
	    	</div>
		<?php for($i=0;$i<count($projects);$i++):?>
			<?php if(isset($projects[$i]['id'])): ?>
		    	<div class="grid_3">
					<a href="<?=$baseurl.$projects[$i]['uri'];?>/proekt-db-<?=$projects[$i]['id'];?>" class="project">
						<img width="170" height="130" src="<?=$baseurl?>viewthumb/<?=$projects[$i]['id']?>" alt="Проект дома из бревна <?=$projects[$i]['id']?>">
					</a>
					<h4>
						<a href="<?=$baseurl.$projects[$i]['uri'];?>/proekt-db-<?=$projects[$i]['id'];?>">
							Дом из бревна ДБ-<?=$projects[$i]['id']?>
						</a>
					</h4>
		    		<p>
		    			Плошадь: <?=$projects[$i]['square'];?> м<sup>2</sup><br/>
		    			Стоимость: <?=$projects[$i]['price'];?> руб.
		    		</p>
		    	</div>
			<?php endif;?>
		<?php endfor;?>
			<div class="grid_12 block-separator"></div>
		</div>
		<div id="contact-info" class="container_12 clearfix">
			<div class="grid_12 clearfix">
				<h2>Наши контакты</h2>
			</div>
			<div class="grid_12">
				<p>Чтобы получить более подробную консультацию по услугам компании Зеленый Дом, 
				звоните или пишите в отдел по работе с клиентами.</p>
				<p><span class="bright">(863) 229-90-72</span> или <span class="bright">sales@dom-iz-breven.ru</span></p>
			</div>
		</div>
		<?php $this->load->view('users_interface/footer'); ?>
	</div> <!--! end of #container -->
	<?php $this->load->view('users_interface/scripts'); ?>
</body>
</html>