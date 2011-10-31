<div class="box">
	<div class="box-content h470 w918">
		<table summary="Список сообщений">
			<thead>
				<tr class="odd">
					<th scope="col" abbr="ID">ID</th>
					<th scope="col" abbr="ДАТА">ДАТА</th>
					<th scope="col" abbr="ИМЯ">ИМЯ</th>	
					<th scope="col" abbr="E-MAIL">E-MAIL</th>
					<th scope="col" abbr="ТЕЛЕФОН">ТЕЛЕФОН</th>
					<th scope="col" abbr="СООБЩЕНИЕ">СООБЩЕНИЕ</th>
					<th scope="col" abbr="ОПЕРАЦИИ">&nbsp;</th>
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
					<td class="tdcenter"><?=$list[$i]['date'];?></td>
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