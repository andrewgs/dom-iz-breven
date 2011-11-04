<header>
	<div class="container_12 top clearfix">
		<div class="grid_6">
			<a id="logo" href="<?=$baseurl;?>">Строительство деревянных домов из оцилиндрованного бревна</a>
		</div>
		<div id="top-contacts" class="grid_6">
			<div class="phone-number no-border"><span class="phone-desc">или по второму номеру</span>+7 (909) 410-75-01</div>
			<div class="phone-number"><span class="phone-desc">Телефон для справок</span>(863) 229-90-72</div>
		</div>
	</div>
	<div class="container_12 clearfix">
		<div class="grid_6 prefix_6">
			<ul id="main-nav">
				<li><a href="<?=$baseurl;?>o-kompanii">О компании</a></li>
				<li><a href="<?=$baseurl;?>proizvodstvo-ocilindrovannogo-brevna">Производство</a></li>
				<li><a href="<?=$baseurl;?>proekti-derevyannih-domov">Проекты</a></li>
				<li><a href="<?=$baseurl;?>ceni-na-derevyannie-doma">Цены</a></li>
				<!--li><a href="<?=$baseurl;?>zakazat-derevyanniy-dom">Заказать</a></li-->
				<li><a href="<?=$baseurl;?>kontakti">Контакты</a></li>
			</ul>
		</div>
	</div>
	<?php if($this->uri->segment(1) == ''):?>
		<div class="container_12 clearfix">
			<div class="grid_6">
				<a id="slogan" href="<?=$baseurl;?>proekti-derevyannih-domov">Деревянные дома из оцилиндрованного бревна</a>
			</div>
			<div class="grid_6">
				<a id="development" href="<?=$baseurl;?>proizvodstvo-ocilindrovannogo-brevna">
					Бани из оцилиндрованного бревна, беседки, рестораны, загородные дома, гостиницы, коттеджные поселки, конюшни, гаражи и малые архитектурные формы 
				</a>
			</div>
		</div>
	<?php endif;?>
</header>