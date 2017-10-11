<?php
/* @var $this TblArticleOrderController */
/* @var $model TblArticleOrder */

$this->breadcrumbs=array(
	'Tbl Article Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TblArticleOrder', 'url'=>array('index')),
	array('label'=>'Create TblArticleOrder', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tbl-article-order-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tbl Article Orders</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-article-order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID',
		'content_type',
		'words',
		'subject',
		'branded_generic',
		'keywords',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
