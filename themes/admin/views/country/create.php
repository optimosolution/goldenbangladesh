<?php
$this->pageTitle = 'New country - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Countries' => array('admin'),
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