<?php
/* @var $this TblReviewController */
/* @var $model TblReview */

$this->breadcrumbs=array(
	'Tbl Reviews'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblReview', 'url'=>array('index')),
	array('label'=>'Manage TblReview', 'url'=>array('admin')),
);
?>

<h1>Create TblReview</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>