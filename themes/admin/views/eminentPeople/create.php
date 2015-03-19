<?php
/* @var $this EminentPeopleController */
/* @var $model EminentPeople */
?>

<?php
$this->pageTitle = 'New Eminent People - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Eminent Peoples' => array('admin'),
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