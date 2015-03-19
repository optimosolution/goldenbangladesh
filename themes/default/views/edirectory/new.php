<?php
/* @var $this EdirectoryController */
/* @var $model Edirectory */
?>

<?php
$this->pageTitle = 'New Blog - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Directories' => array('index'),
    'New Listing',
);
?>
<fieldset>
    <legend>New Listing</legend>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>