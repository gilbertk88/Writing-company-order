<?php
/* @var $this TblPaymentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Payments',
);

$this->menu=array(
	array('label'=>'Create TblPayment', 'url'=>array('create')),
	array('label'=>'Manage TblPayment', 'url'=>array('admin')),
);
?>

<h1>Tbl Payments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
