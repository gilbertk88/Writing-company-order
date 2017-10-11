<?php
/* @var $this TblGenericBrandedController */
/* @var $model TblGenericBranded */

$this->breadcrumbs=array(
	'Tbl Generic Brandeds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblGenericBranded', 'url'=>array('index')),
	array('label'=>'Manage TblGenericBranded', 'url'=>array('admin')),
);
?>

<h1>Create TblGenericBranded</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>