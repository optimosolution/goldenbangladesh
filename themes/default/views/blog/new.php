<?php
$this->pageTitle = 'New Blog - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'New Blog',
);
?>
<fieldset>
    <legend>New Blog</legend>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>