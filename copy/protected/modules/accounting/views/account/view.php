<h1><?php echo $model->name?></h1>
<h3>Sub-Akun</h3>
<ul>
<?php foreach($model->Child as $ac):?>
	<li><?php echo CHtml::link($ac->name,array("/account/view","id"=>$ac->id))?></li>
<?php endforeach;?>
</ul>
<table class="table table-striped">
	<thead>
		<th>Id Transaksi</th>
		<th>Keterangan</th>
		<th>Debit</th>
		<th>Kredit</th>
	</thead>
	<tbody>
	<?php
	$balanceCredit=0;
	$balanceDebit=0;
	foreach($model->TransactionDetails as $td):?>
		<tr>
			<td><?php echo $td->transaction_id;?></td>
			<td><?php echo CHtml::link($td->Transaction->Detail,array("transaction/view","id"=>$td->transaction_id));?></td>
			<?php if($td->type=="Debit"):?>
				<td>
					<?php $balanceDebit+= $td->ammount;echo $td->ammount;?>
				</td>
				<td>
				</td>
			<?php else:?>
				<td>					
				</td>
				<td>
					<?php $balanceCredit += $td->ammount;echo $td->ammount;?>
				</td>
			<?php endif;?>	
		</tr>
	<?php endforeach;?>
	</tbody>
	<tfoot>
		<tr>
			<td colspan="2">Neraca</td>
			
			<td><?php echo $balanceDebit?></td>
			<td><?php echo $balanceCredit?></td>
		</tr>
	</tfoot>
</table>
