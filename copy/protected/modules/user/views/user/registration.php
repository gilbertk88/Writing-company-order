<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
$this->breadcrumbs=array(
	UserModule::t("Registration"),
);
?>

<h1>

<?php 
echo UserModule::t("Registration"); ?></h1>or <?php 
	echo CHtml::link('Log in here(if you already have an account)', array('login/'.$id));
	?>
		
<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="row flow  step_2">
<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
	<?php echo CHtml::errorSummary($form); ?>
	<?php echo CHtml::errorSummary($profile); ?>
	
	<div class="clearfix orderdetails narrow">
	<?php echo CHtml::activeLabelEx($form,'username'); ?>
	<?php echo CHtml::activeTextField($form,'username'); ?>
	</div>
	
	<div class="clearfix orderdetails narrow">
	<?php echo CHtml::activeLabelEx($form,'email'); ?>
	<?php echo CHtml::activeTextField($form,'email'); ?>
	</div>
	
	<div class="clearfix orderdetails narrow">
	<?php echo CHtml::activeLabelEx($form,'password'); ?>
	<?php echo CHtml::activePasswordField($form,'password'); ?>
	<p class="hint">
	<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
	</p>
	</div>
	
	<div class="clearfix orderdetails narrow">
	<?php echo CHtml::activeLabelEx($form,'verifyPassword'); ?>
	<?php echo CHtml::activePasswordField($form,'verifyPassword'); ?>
	</div>
	
	
	
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="clearfix orderdetails narrow">
		<?php echo CHtml::activeLabelEx($profile,$field->varname); ?>
		<?php 
		if ($field->widgetEdit($profile)) {
			echo $field->widgetEdit($profile);
		} elseif ($field->range) {
			echo CHtml::activeDropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('clearfix orderdetails narrows'=>6, 'cols'=>40));
		} else {
			echo CHtml::activeTextField($profile,$field->varname,array('size'=>40,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		echo CHtml::error($profile,$field->varname); ?>
	</div>	
			<?php
			}
		}
?>
	<?php if (UserModule::doCaptcha('registration')): ?>
	<div class="clearfix orderdetails narrow">
		<?php echo CHtml::activeLabelEx($form,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo CHtml::activeTextField($form,'verifyCode'); ?>
		</div>
		<p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
		<br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
	</div>
	<?php endif; ?>
	
	<div class="clearfix orderdetails narrow submit">
		<?php echo CHtml::submitButton(UserModule::t("Register"),array('class'=>'btn success step_continue')); ?>
	</div>

<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<?php endif; ?>