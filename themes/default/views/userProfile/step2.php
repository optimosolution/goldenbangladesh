<?php
$this->pageTitle = 'Update profile - ' . Yii::app()->name;
$this->breadcrumbs = array(
    $this->get_fullname() => array('/user/view', 'id' => $model->user_id),
    'Update profile - Second Step',
);
?>
<fieldset>
    <legend>Second Step</legend>
    <?php $this->renderPartial('_step2', array('model' => $model)); ?>
</fieldset>