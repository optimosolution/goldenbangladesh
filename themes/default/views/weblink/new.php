<?php
$this->pageTitle = 'New Weblink - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'New Weblink',
);
?>
<fieldset>
    <legend>New Weblink</legend>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>