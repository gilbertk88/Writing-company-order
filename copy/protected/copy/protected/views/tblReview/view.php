<?php
/* @var $this TblReviewController */
/* @var $model TblReview */

$this->breadcrumbs=array(
	'Tbl Reviews'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TblReview', 'url'=>array('index')),
	array('label'=>'Create TblReview', 'url'=>array('create')),
	array('label'=>'Update TblReview', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TblReview', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TblReview', 'url'=>array('admin')),
);
?>

<h1>View TblReview #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rating',
		'comments',
	),
)); ?>
