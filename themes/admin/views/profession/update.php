<?php
/* @var $this ProfessionController */
/* @var $model Profession */
?>

<?php
$this->breadcrumbs=array(
	'Professions'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Profession', 'url'=>array('index')),
	array('label'=>'Create Profession', 'url'=>array('create')),
	array('label'=>'View Profession', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Profession', 'url'=>array('admin')),
);
?>

    <h1>Update Profession <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>