<?php
/* @var $this TblGenericBrandedController */
/* @var $model TblGenericBranded */

$this->breadcrumbs=array(
	'Tbl Generic Brandeds'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List TblGenericBranded', 'url'=>array('index')),
	array('label'=>'Create TblGenericBranded', 'url'=>array('create')),
	array('label'=>'Update TblGenericBranded', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblGenericBranded', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblGenericBranded', 'url'=>array('admin')),
);
?>

<h1>View TblGenericBranded #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
