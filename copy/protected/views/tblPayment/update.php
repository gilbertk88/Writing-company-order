<?php
/* @var $this TblPaymentController */
/* @var $model TblPayment */

$this->breadcrumbs=array(
	'Tbl Payments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblPayment', 'url'=>array('index')),
	array('label'=>'Create TblPayment', 'url'=>array('create')),
	array('label'=>'View TblPayment', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblPayment', 'url'=>array('admin')),
);
?>

<h1>Update TblPayment <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>