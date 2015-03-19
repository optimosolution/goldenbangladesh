<?php
/* @var $this GalleryController */
/* @var $model Gallery */
$this->pageTitle = 'Edit galley picture - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Galleries' => array('admin'),
    $model->caption => array('view', 'id' => $model->id),
    'Update',
);
$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Details', 'url' => array('view', 'id' => $model->id), 'active' => true, 'icon' => 'icon-th-large'),
);
?>
<fieldset>
    <legend><?php echo $model->caption; ?></legend>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>