<?php
$this->breadcrumbs=array(
	'User Profiles'=>array('index'),
	'Create',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
?>

<h1>Create UserProfile</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>