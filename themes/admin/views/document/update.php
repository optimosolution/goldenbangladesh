<?php
$this->pageTitle = 'Edit document - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Documents' => array('admin'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Details', 'url' => array('view', 'id' => $model->id), 'active' => true, 'icon' => 'icon-th-large'),
);
?>
<fieldset>
    <legend><?php echo $model->title; ?></legend>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>