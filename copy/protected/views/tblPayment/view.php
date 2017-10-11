<?php
/* @var $this TblPaymentController */
/* @var $model TblPayment */

$this->breadcrumbs=array(
	'Tbl Payments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblPayment', 'url'=>array('index')),
	array('label'=>'Create TblPayment', 'url'=>array('create')),
	array('label'=>'Update TblPayment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblPayment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblPayment', 'url'=>array('admin')),
);
?>

<h1>View TblPayment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'owner_id',
		'amount',
		'time_stamp',
		'currency',
		'payment_status',
	),
)); ?>
