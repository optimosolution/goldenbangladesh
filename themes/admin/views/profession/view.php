<?php
/* @var $this ProfessionController */
/* @var $model Profession */
?>

<?php
$this->breadcrumbs=array(
	'Professions'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Profession', 'url'=>array('index')),
	array('label'=>'Create Profession', 'url'=>array('create')),
	array('label'=>'Update Profession', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Profession', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Profession', 'url'=>array('admin')),
);
?>

<h1>View Profession #<?php echo $model->id; ?></h1>

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