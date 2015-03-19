<?php
/* @var $this DistrictController */
/* @var $model District */
?>

<?php
$this->pageTitle = 'New district - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Districts' => array('admin'),
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