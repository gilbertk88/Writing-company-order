<?php
/* @var $this TblPaymentStatusController */
/* @var $model TblPaymentStatus */

$this->breadcrumbs=array(
	'Tbl Payment Statuses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TblPaymentStatus', 'url'=>array('index')),
	array('label'=>'Create TblPaymentStatus', 'url'=>array('create')),
	array('label'=>'Update TblPaymentStatus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblPaymentStatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblPaymentStatus', 'url'=>array('admin')),
);
?>

<h1>View TblPaymentStatus #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',
	),
)); ?>
