<?php
$this->pageTitle = 'New Blog - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Blogs' => array('index'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);
?>
<fieldset>
    <legend>Update Blog - <?php echo $model->title; ?></legend>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>