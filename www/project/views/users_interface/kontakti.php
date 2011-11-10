<?php $this->load->view('users_interface/head'); ?>
<body>
	<div id="container">
		<?php $this->load->view('users_interface/header'); ?>
	    <div id="main" class="container_12 clearfix">
	    	<div class="grid_12">
	    		<h1>Наши контакты</h1>
	    		<p class="short-text">Мы всегда будем рады видеть Вас в нашем офисе, а наша справочная служба готова ответить на любой возникший у Вас вопрос 24 часа в сутки 7 дней в неделю.</p>
	    	</div>
	    	<div class="grid_12 block-separator"></div>
	    	<div class="grid_12">
	   			<p><span class="black">Адрес:</span> 344019, г.Ростов-на-Дону, ул.Доватора, 229<br></p>
				<p><span class="black">Телефоны:</span> (863) 229-90-72, +7 (909) 410-75-01</p>
				<p><span class="black">E-mail:</span> <a class="green-link" href="mailto:info@dom-iz-breven.ru">info@dom-iz-breven.ru</a></p>
				<p><span class="black">На карте:</span></p>
			    <?php $this->load->view('users_interface/yandex-map'); ?>	
		   	</div>
		     <?php $this->load->view('forms/frmsendmail'); ?>
	    </div>
    <?php $this->load->view('users_interface/footer'); ?>
	</div> <!--! end of #container -->
	<?php $this->load->view('users_interface/scripts'); ?>
</body>
</html>