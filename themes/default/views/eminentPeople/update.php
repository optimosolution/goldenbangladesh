<?php
/* @var $this EminentPeopleController */
/* @var $model EminentPeople */
?>

<?php
$this->breadcrumbs=array(
	'Eminent Peoples'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EminentPeople', 'url'=>array('index')),
	array('label'=>'Create EminentPeople', 'url'=>array('create')),
	array('label'=>'View EminentPeople', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EminentPeople', 'url'=>array('admin')),
);
?>

    <h1>Update EminentPeople <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>