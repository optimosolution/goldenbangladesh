<?php
/* @var $this BloodGroupController */
/* @var $model BloodGroup */
?>

<?php
$this->breadcrumbs=array(
	'Blood Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BloodGroup', 'url'=>array('index')),
	array('label'=>'Manage BloodGroup', 'url'=>array('admin')),
);
?>

<h1>Create BloodGroup</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>