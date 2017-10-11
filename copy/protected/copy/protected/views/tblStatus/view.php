<?php
/* @var $this TblStatusController */
/* @var $model TblStatus */

$this->breadcrumbs=array(
	'Tbl Statuses'=>array('index'),
	$model->Name,
);

$this->menu=array(
	array('label'=>'List TblStatus', 'url'=>array('index')),
	array('label'=>'Create TblStatus', 'url'=>array('create')),
	array('label'=>'Update TblStatus', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblStatus', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblStatus', 'url'=>array('admin')),
);
?>

<h1>View TblStatus #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'Name',
		'Description',
	),
)); ?>
