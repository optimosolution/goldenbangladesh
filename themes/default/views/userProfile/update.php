<?php
/* @var $this UserProfileController */
/* @var $model UserProfile */
?>

<?php
$this->breadcrumbs=array(
	'User Profiles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserProfile', 'url'=>array('index')),
	array('label'=>'Create UserProfile', 'url'=>array('create')),
	array('label'=>'View UserProfile', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserProfile', 'url'=>array('admin')),
);
?>

    <h1>Update UserProfile <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>