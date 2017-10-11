
	    	<!-- flash -->
	    	
<?php
/* @var $this TblArticleOrderController */
/* @var $model TblArticleOrder */

$this->breadcrumbs=array(
	'Tbl Article Orders'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblArticleOrder', 'url'=>array('index')),
	array('label'=>'Create TblArticleOrder', 'url'=>array('create')),
	array('label'=>'View TblArticleOrder', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage TblArticleOrder', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_preview', array('model'=>$model)); ?>
