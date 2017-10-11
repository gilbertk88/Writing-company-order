<?php
/* @var $this TblArticleOrderController */
/* @var $model TblArticleOrder */

$this->breadcrumbs=array(
	'Article'=>array('index'),
	$model->ID,
);

$this->menu=array(
	//array('label'=>'List TblArticleOrder', 'url'=>array('index')),
	//array('label'=>'Create TblArticleOrder', 'url'=>array('create')),
	array('label'=>'Update TblArticleOrder', 'url'=>array('pay', 'id'=>$model->ID)),
	//array('label'=>'Delete TblArticleOrder', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage TblArticleOrder', 'url'=>array('admin')),
);
?>

<h1>View Article Order #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'content_type',
		'words',
		'subject',
		'branded_generic',
		'keywords',
		'attach_file_path',
		'additional_info',
		'status',
		'date_created',
		'Deadline',
		'date_completed',
		'Writer',
		'Review',
		'owner',
		'cost',
		'payment_status',
	),
)); ?>
