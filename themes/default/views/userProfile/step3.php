<?php
$this->pageTitle = 'Update profile - ' . Yii::app()->name;
$this->breadcrumbs = array(
    $this->get_fullname() => array('/user/view', 'id' => $model->user_id),
    'Update profile - Third Step',
);
?>
<fieldset>
    <legend>Third Step</legend>
    <?php $this->renderPartial('_step3', array('model' => $model)); ?>
</fieldset>