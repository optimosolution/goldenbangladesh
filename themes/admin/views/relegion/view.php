<?php
/* @var $this RelegionController */
/* @var $model Relegion */
?>

<?php
$this->breadcrumbs=array(
	'Relegions'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Relegion', 'url'=>array('index')),
	array('label'=>'Create Relegion', 'url'=>array('create')),
	array('label'=>'Update Relegion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Relegion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Relegion', 'url'=>array('admin')),
);
?>

<h1>View Relegion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'title',
	),
)); ?>