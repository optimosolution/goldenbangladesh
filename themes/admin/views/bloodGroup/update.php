<?php
/* @var $this BloodGroupController */
/* @var $model BloodGroup */
?>

<?php
$this->breadcrumbs=array(
	'Blood Groups'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BloodGroup', 'url'=>array('index')),
	array('label'=>'Create BloodGroup', 'url'=>array('create')),
	array('label'=>'View BloodGroup', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BloodGroup', 'url'=>array('admin')),
);
?>

    <h1>Update BloodGroup <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>