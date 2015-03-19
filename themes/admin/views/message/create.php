<?php
/* @var $this MessageController */
/* @var $model Message */
?>

<?php
$this->pageTitle = 'New Messages - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Messages' => array('admin'),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
?>
<fieldset>
    <legend>New</legend>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>