<?php
/* @var $this TblPaymentStatusController */
/* @var $model TblPaymentStatus */

$this->breadcrumbs=array(
	'Tbl Payment Statuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblPaymentStatus', 'url'=>array('index')),
	array('label'=>'Manage TblPaymentStatus', 'url'=>array('admin')),
);
?>

<h1>Create TblPaymentStatus</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>