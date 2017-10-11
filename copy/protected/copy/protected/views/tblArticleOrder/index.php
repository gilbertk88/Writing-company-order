<?php
/* @var $this TblArticleOrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Article Orders',
);

$this->menu=array(
	array('label'=>'Create TblArticleOrder', 'url'=>array('create')),
	array('label'=>'Manage TblArticleOrder', 'url'=>array('admin')),
);
?>

<h1>Tbl Article Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
