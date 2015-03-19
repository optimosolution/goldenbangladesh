<?php
/* @var $this GalleryController */
/* @var $model Gallery */
?>

<?php
$this->pageTitle = 'New Picture - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Galleries' => array('index'),
    'New Picture',
);
?>
<fieldset>
    <legend>New Picture</legend>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>