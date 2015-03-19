<?php
$this->pageTitle = 'Edit admin user - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Admin users' => array('admin'),
    $model->name => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Details', 'url' => array('view', 'id' => $model->id), 'active' => true, 'icon' => 'icon-th-large'),
    array('label' => 'Change Password', 'url' => array('edit', 'id' => $model->id), 'active' => true, 'icon' => 'icon-edit'),
);
?>
<fieldset>
    <legend><?php echo $model->name; ?></legend>
<?php echo $this->renderPartial('_form_update', array('model' => $model)); ?>
</fieldset>