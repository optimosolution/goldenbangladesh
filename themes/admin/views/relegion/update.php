<?php
/* @var $this RelegionController */
/* @var $model Relegion */
?>

<?php
$this->breadcrumbs=array(
	'Relegions'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Relegion', 'url'=>array('index')),
	array('label'=>'Create Relegion', 'url'=>array('create')),
	array('label'=>'View Relegion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Relegion', 'url'=>array('admin')),
);
?>

    <h1>Update Relegion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>