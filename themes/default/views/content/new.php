<?php
$this->pageTitle = 'New Problem & Possibility - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'New Problem & Possibility',
);
?>
<fieldset>
    <legend>New Problem & Possibility</legend>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>