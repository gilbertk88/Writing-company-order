<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'enableClientValidation'=>false,
    'htmlOptions'=>array(
		'class'=>'form-horizontal',
		'enctype' => 'multipart/form-data'
		),
)); ?>
	<div class="control-group">
		<?php echo $form->labelEx($model,'date',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
				'name'=>'Transaction[date]',
				// additional javascript options for the date picker plugin
				'options'=>array(
					'showAnim'=>'fold',
					'dateFormat'=>'yy-mm-dd',
				),
				'htmlOptions'=>array(
					'style'=>'height:20px;',
					
				),
			)); 
			?>
			<?php echo $form->error($model,'name'); ?>
		</div>
	</div>
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'Detail',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'Detail');?>
			<?php echo $form->error($model,'Detail'); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'image',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->fileField($model,'image');?>
			<?php echo $form->error($model,'image'); ?>
		</div>
	</div>
	<legend>Akun Terpengaruh</legend>
	<div class="controls">
		<div id="transactionDetails">
			<div>
				<?php echo CHtml::dropDownList('TransactionDetail[account_id][]','',CHtml::listData(Account::model()->findAll(),'id','name'))?><?php echo CHtml::dropDownList('TransactionDetail[Type][]','',array("Debit"=>"Debit","Credit"=>"Credit"))?><input type="text" name="TransactionDetail[ammount][]" placeholder="Jumlah"/>
			</div>
		</div>
	</div>
	<a href="#" class="btn" onclick="addTransactionDetail()"><i class="icon-plus"></i>Tambah Akun Terpengaruh</a>

	<div class="control-group">
		<div class="controls">
			<?php echo CHtml::submitButton("Simpan"); ?>
		</div>
	</div>
	<script>
		function addTransactionDetail()
		{
			var t = $("#dynamicAcc").html();
			$("#transactionDetails").append(t);
		}
	</script>
<?php $this->endWidget();?>
	<div id="dynamicAcc" style="display:none">
		<div>
			<?php echo CHtml::dropDownList('TransactionDetail[account_id][]','',CHtml::listData(Account::model()->findAll(),'id','name'))?><?php echo CHtml::dropDownList('TransactionDetail[Type][]','',array("Debit"=>"Debit","Credit"=>"Credit"))?><input type="text" name="TransactionDetail[ammount][]" placeholder="Jumlah"/>
		</div>
	</div>
