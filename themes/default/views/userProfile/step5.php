<?php
$this->pageTitle = 'Update profile - ' . Yii::app()->name;
$this->breadcrumbs = array(
    $this->get_fullname() => array('/user/view', 'id' => $model->user_id),
    'Update profile - Fifth Step',
);
?>
<fieldset>
    <legend>Fifth Step (Political/Social worker)</legend>
    <?php $this->renderPartial('_step5', array('model' => $model)); ?>
</fieldset>