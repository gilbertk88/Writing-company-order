<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        'Detail',
        'date',
        array(
			'label'=>'Bukti Transaksi',
			'type'=>'raw',
            'value'=>CHtml::image(Yii::app()->getBaseUrl().$this->module->params["uploadUrlPath"].$model->image),
        ),
    ),
));
?>
<h3>Transaksi Terpengaruh</h3>
<table class="table table-striped">
	<thead>
		<th>Id Transaksi</th>
		<th>Akun</th>
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
			<td><?php echo CHtml::link($td->Account->name,array("account/view","id"=>$td->account_id));?></td>
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
