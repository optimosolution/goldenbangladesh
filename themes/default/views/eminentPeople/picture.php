<?php
/* @var $this EminentPeopleController */
/* @var $model EminentPeople */
?>
<?php
$this->pageTitle = 'New Eminent People - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Eminent Peoples' => array('admin'),
    'Upload Picture',
);
?>
<fieldset>
    <legend>Upload Eminent People Picture</legend>
    <?php $this->renderPartial('_picture', array('model' => $model)); ?>
</fieldset>