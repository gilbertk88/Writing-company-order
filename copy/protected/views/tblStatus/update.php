<?php
/* @var $this TblStatusController */
/* @var $model TblStatus */

$this->breadcrumbs=array(
	'Tbl Statuses'=>array('index'),
	$model->Name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblStatus', 'url'=>array('index')),
	array('label'=>'Create TblStatus', 'url'=>array('create')),
	array('label'=>'View TblStatus', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblStatus', 'url'=>array('admin')),
);
?>

<h1>Update TblStatus <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>