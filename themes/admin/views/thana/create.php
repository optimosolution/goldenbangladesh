<?php
/* @var $this ThanaController */
/* @var $model Thana */
?>

<?php
$this->pageTitle = 'New thana - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Thanas' => array('admin'),
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