<?php
/* @var $this TblPaymentStatusController */
/* @var $model TblPaymentStatus */

$this->breadcrumbs=array(
	'Tbl Payment Statuses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblPaymentStatus', 'url'=>array('index')),
	array('label'=>'Create TblPaymentStatus', 'url'=>array('create')),
	array('label'=>'View TblPaymentStatus', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblPaymentStatus', 'url'=>array('admin')),
);
?>

<h1>Update TblPaymentStatus <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>