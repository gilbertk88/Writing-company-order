<?php
/* @var $this TblGenericBrandedController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Generic Brandeds',
);

$this->menu=array(
	array('label'=>'Create TblGenericBranded', 'url'=>array('create')),
	array('label'=>'Manage TblGenericBranded', 'url'=>array('admin')),
);
?>

<h1>Tbl Generic Brandeds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
