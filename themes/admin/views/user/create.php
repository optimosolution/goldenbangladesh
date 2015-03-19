<?php
$this->pageTitle = 'New user - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Users' => array('admin'),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
?>
<fieldset>
    <legend>New</legend>
    <?php echo $this->renderPartial('_form', array('model' => $model, 'model_profile' => $model_profile,)); ?>
</fieldset>