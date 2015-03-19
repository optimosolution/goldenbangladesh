<?php
/* @var $this RelegionController */
/* @var $model Relegion */
?>

<?php
$this->breadcrumbs=array(
	'Relegions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Relegion', 'url'=>array('index')),
	array('label'=>'Manage Relegion', 'url'=>array('admin')),
);
?>

<h1>Create Relegion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>