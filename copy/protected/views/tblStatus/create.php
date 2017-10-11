<?php
/* @var $this TblStatusController */
/* @var $model TblStatus */

$this->breadcrumbs=array(
	'Tbl Statuses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblStatus', 'url'=>array('index')),
	array('label'=>'Manage TblStatus', 'url'=>array('admin')),
);
?>

<h1>Create TblStatus</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>