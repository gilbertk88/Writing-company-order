<?php
/* @var $this TblStatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Statuses',
);

$this->menu=array(
	array('label'=>'Create TblStatus', 'url'=>array('create')),
	array('label'=>'Manage TblStatus', 'url'=>array('admin')),
);
?>

<h1>Tbl Statuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
