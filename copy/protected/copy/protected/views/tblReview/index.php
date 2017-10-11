<?php
/* @var $this TblReviewController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Reviews',
);

$this->menu=array(
	array('label'=>'Create TblReview', 'url'=>array('create')),
	array('label'=>'Manage TblReview', 'url'=>array('admin')),
);
?>

<h1>Tbl Reviews</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
