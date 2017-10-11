<?php
/* @var $this TblPaymentStatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Payment Statuses',
);

$this->menu=array(
	array('label'=>'Create TblPaymentStatus', 'url'=>array('create')),
	array('label'=>'Manage TblPaymentStatus', 'url'=>array('admin')),
);
?>

<h1>Tbl Payment Statuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
