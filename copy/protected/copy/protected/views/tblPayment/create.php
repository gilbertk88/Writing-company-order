<?php
/* @var $this TblPaymentController */
/* @var $model TblPayment */

$this->breadcrumbs=array(
	'Tbl Payments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblPayment', 'url'=>array('index')),
	array('label'=>'Manage TblPayment', 'url'=>array('admin')),
);
?>

<h1>Create TblPayment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>