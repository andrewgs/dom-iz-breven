<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?=$baseurl;?>js/libs/jquery-1.6.2.min.js"><\/script>')</script>
<!-- scripts concatenated and minified via ant build script-->
<script defer src="<?=$baseurl;?>js/plugins.js"></script>
<script defer src="<?=$baseurl;?>js/script.js"></script>
<script src="<?=$baseurl;?>js/jquery.prettyphoto.js"></script>
<?php if($form):?>
	<script defer src="<?=$baseurl;?>js/jquery.jgrowl.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			
			$("area[rel^='prettyPhoto']").prettyPhoto();
			$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto();
			$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto();
			
			$("#btn").click(function(event){
				event.preventDefault();
				var err = false;
				var name = $("#name").val();
			 	var email = $("#email").val();
			 	var phone = $("#phone").val();
			 	var comments = $("#comments").val();
				$(".inpval").css('border-color','#C0C0C0 #D9D9D9 #D9D9D9');
				$(".inpval").each(function(i,element){if($(this).val()===''){$(this).css('border-color','#FF0000');err = true;}});
				if(err){
					$.jGrowl("Пропущены обязательные поля!",{header:'Форма обратной связи'});
				}else if(!isValidEmailAddress(email)){
					$("#email").css('border-color','#FF0000');
					$.jGrowl("Не верный адрес E-Mail",{header:'Форма обратной связи'});
				}else{
					$.post("<?=$baseurl;?>send-mail",
						{'name':name,'email':email,'phone':phone,'comments':comments},
						function(data){
							if(data.status){
								$.jGrowl("Сообщение отправлено!",{header:'Форма обратной связи',beforeClose: function(e,m){$(".inpval").css('border-color','#C0C0C0 #D9D9D9 #D9D9D9');$(".inpval").val('');}});
							}else $.jGrowl("Сообщение не отправлено!",{header:'Форма обратной связи'});
						},"json");
				}
			});
			function isValidEmailAddress(emailAddress){
				var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
				return pattern.test(emailAddress);
			};
		});
	</script>
<?php endif;?>
<!-- end scripts-->
<!-- Google Analytics -->
<script>
	window._gaq = [['_setAccount','UA-17193616-5'],['_trackPageview'],['_trackPageLoadTime']];
	Modernizr.load({
		load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
	});
</script>
<!-- Yandex.Metrika counter -->
<div style="display:none;"><script type="text/javascript">
(function(a,b){(a[b]=a[b]||[]).push(function(){try{a.yaCounter10210753=new Ya.Metrika({id:10210753,enableAll:true})}catch(b){}})})(window,"yandex_metrika_callbacks");
</script></div>
<script src="//mc.yandex.ru/metrika/watch.js" type="text/javascript" defer="defer"></script>
<noscript><div><img src="//mc.yandex.ru/watch/10210753" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->