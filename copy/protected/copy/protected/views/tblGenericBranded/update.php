<?php
/* @var $this TblGenericBrandedController */
/* @var $model TblGenericBranded */

$this->breadcrumbs=array(
	'Tbl Generic Brandeds'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblGenericBranded', 'url'=>array('index')),
	array('label'=>'Create TblGenericBranded', 'url'=>array('create')),
	array('label'=>'View TblGenericBranded', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblGenericBranded', 'url'=>array('admin')),
);
?>

<h1>Update TblGenericBranded <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>