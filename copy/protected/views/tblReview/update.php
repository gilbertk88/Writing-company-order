<?php
/* @var $this TblReviewController */
/* @var $model TblReview */

$this->breadcrumbs=array(
	'Tbl Reviews'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblReview', 'url'=>array('index')),
	array('label'=>'Create TblReview', 'url'=>array('create')),
	array('label'=>'View TblReview', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblReview', 'url'=>array('admin')),
);
?>

<h1>Update TblReview <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>