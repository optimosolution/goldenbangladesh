<?php
/* @var $this UserTypeController */
/* @var $model UserType */
?>

<?php
$this->pageTitle = 'New User Type - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'User Types' => array('admin'),
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