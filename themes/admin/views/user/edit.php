<?php
$this->pageTitle = 'Change password - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Users' => array('admin'),
    $model->name => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Details', 'url' => array('view', 'id' => $model->id), 'active' => true, 'icon' => 'icon-th-large'),
);
?>
<fieldset>
    <legend><?php echo $model->name; ?></legend>
    <?php echo $this->renderPartial('_form_edit', array('model' => $model)); ?>
</fieldset>