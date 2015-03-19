<?php
$this->pageTitle = 'Update profile - ' . Yii::app()->name;
$this->breadcrumbs = array(
    $this->get_fullname() => array('/user/view', 'id' => $model->user_id),
    'Update profile - Fourth Step',
);
?>
<fieldset>
    <legend>Fourth Step</legend>
    <?php $this->renderPartial('_step4', array('model' => $model)); ?>
</fieldset>