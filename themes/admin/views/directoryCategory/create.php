<?php
/* @var $this DirectoryCategoryController */
/* @var $model DirectoryCategory */
?>

<?php
$this->pageTitle = 'New directory category - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Directory Categories' => array('admin'),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
?>
<fieldset>
    <legend>New</legend>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>