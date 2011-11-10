<div class="box">
	<div class="box-content h470 w918">
		<table class="table" width="100%" summary="Список сообщений">
			<thead>
				<tr class="odd">
					<th scope="col" abbr="ID">ID</th>
					<th scope="col" abbr="Дата">Дата</th>
					<th scope="col" abbr="Имя">Имя</th>	
					<th scope="col" abbr="E-mail">E-mail</th>
					<th scope="col" abbr="Телефон">Телефон</th>
					<th scope="col" abbr="Сообщение">Сообщение</th>
					<th scope="col" abbr="Операции">&nbsp;</th>
				</tr>	
			</thead>
		    <tfoot>	
			 	&nbsp;
			</tfoot>
			<tbody>
			<?php for($i=0;$i<count($list);$i++):?>
				<?php if($i % 2 !== 0): ?>
					<tr rID="<?=$i?>"> 
				<?php else: ?>
					<tr class="odd" rID="<?=$i?>"> 
				<?php endif; ?>
					<td class="tdcenter" rID="<?=$i?>"><?=$list[$i]['id'];?></td>
					<td class="tdcenter"><?=date("d/m/Y",strtotime($list[$i]['date']));?></td>
					<td class="tdcenter"><?=$list[$i]['name'];?></td>
					<td class="tdcenter"><?=$list[$i]['email'];?></td>
					<td class="tdcenter"><?=$list[$i]['phone'];?></td>
					<td class="smtext"><?=$list[$i]['text'];?></td>
					<td>
						<div class="ButtonOperation">
			<input type="image" title="Удалить" class="btnDelete"rID="<?=$i?>" src="<?=$baseurl;?>img/delete_icon.png" />
						</div>
					</td> 
				</tr>
				<?php endfor; ?>	
			</tbody>
		</table>
	</div>
</div>