<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'enableClientValidation'=>true,
    'focus'=>array($model,'firstName'),
    'htmlOptions'=>array(
		'class'=>'form-horizontal'
		),
)); ?>
	<div class="control-group">
		<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->textField($model,'name'); ?>
			<?php echo $form->error($model,'name'); ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo $form->labelEx($model,'parent_id',array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo $form->dropDownList($model,'parent_id',CHtml::listData(Account::model()->findAll(),'id','name')); ?>
			<?php echo $form->error($model,'parent_id'); ?>
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<?php echo CHtml::submitButton("Simpan"); ?>
		</div>
	</div>
<?php $this->endWidget();?>
