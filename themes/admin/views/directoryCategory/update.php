<?php
/* @var $this DirectoryCategoryController */
/* @var $model DirectoryCategory */
?>

<?php
$this->pageTitle = 'Edit directory category - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Directory Categories' => array('admin'),
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
    <?php echo $this->renderPartial('_form_update', array('model' => $model)); ?>
</fieldset>