<?php
/* @var $this MessageController */
/* @var $model Message */
?>

<?php
$this->pageTitle = 'Edit message - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Messages' => array('index'),
    $model->subject => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Details', 'url' => array('view', 'id' => $model->id), 'active' => true, 'icon' => 'icon-th-large'),
);
?>
<fieldset>
    <legend><?php echo $model->subject; ?></legend>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>