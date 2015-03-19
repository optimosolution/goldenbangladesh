<?php
$this->pageTitle = 'Update profile - ' . Yii::app()->name;
$this->breadcrumbs = array(
    $model->name => array('view', 'id' => $model->id),
    'Update profile',
);
?>
<fieldset>
    <legend>Update profile</legend>
    <?php $this->renderPartial('_form_update', array('model' => $model, 'model_profile' => $model_profile,)); ?>
</fieldset>