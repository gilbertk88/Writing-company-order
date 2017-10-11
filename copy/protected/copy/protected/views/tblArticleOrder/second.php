<?php
/* @var $this TblArticleOrderController */
/* @var $model TblArticleOrder */

$this->breadcrumbs=array(
	'Create your web page brief'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Second',
);
?>


<?php $this->renderPartial('_form2', array('model'=>$model)); ?>