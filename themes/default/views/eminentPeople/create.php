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
?>
<fieldset>
    <legend>New Eminent People</legend>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>