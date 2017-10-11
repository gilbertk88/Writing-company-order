<?php
/* @var $this TblArticleOrderController */
/* @var $model TblArticleOrder */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'content_type'); ?>
		<?php echo $form->textField($model,'content_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'words'); ?>
		<?php echo $form->textField($model,'words',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>140)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'branded_generic'); ?>
		<?php echo $form->textField($model,'branded_generic'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'keywords'); ?>
		<?php echo $form->textField($model,'keywords',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'attach_file_path'); ?>
		<?php echo $form->textField($model,'attach_file_path',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'additional_info'); ?>
		<?php echo $form->textField($model,'additional_info',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_created'); ?>
		<?php echo $form->textField($model,'date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Deadline'); ?>
		<?php echo $form->textField($model,'Deadline'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_completed'); ?>
		<?php echo $form->textField($model,'date_completed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Writer'); ?>
		<?php echo $form->textField($model,'Writer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Review'); ?>
		<?php echo $form->textField($model,'Review'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'owner'); ?>
		<?php echo $form->textField($model,'owner'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cost'); ?>
		<?php echo $form->textField($model,'cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_status'); ?>
		<?php echo $form->textField($model,'payment_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->