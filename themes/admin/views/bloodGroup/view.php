<?php
/* @var $this BloodGroupController */
/* @var $model BloodGroup */
?>

<?php
$this->breadcrumbs=array(
	'Blood Groups'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List BloodGroup', 'url'=>array('index')),
	array('label'=>'Create BloodGroup', 'url'=>array('create')),
	array('label'=>'Update BloodGroup', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BloodGroup', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BloodGroup', 'url'=>array('admin')),
);
?>

<h1>View BloodGroup #<?php echo $model->id; ?></h1>

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