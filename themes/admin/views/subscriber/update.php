<?php
$this->pageTitle = 'Edit subscriber - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Subscribers' => array('admin'),
    $model->email => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Details', 'url' => array('view', 'id' => $model->id), 'active' => true, 'icon' => 'icon-th-large'),
);
?>
<fieldset>
    <legend><?php echo $model->email; ?></legend>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>