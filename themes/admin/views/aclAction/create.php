<?php
$this->pageTitle = 'New ACL action - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'ACL Actions' => array('actions', 'cid' => $_GET['cid']),
    'Create',
);

$this->menu = array(
    array('label' => 'Controllers', 'url' => array('aclController/admin'), 'active' => true, 'icon' => 'icon-arrow-up'),
    array('label' => 'Manage', 'url' => array('actions', 'cid' => $_GET['cid']), 'active' => true, 'icon' => 'icon-home'),
);
?>
<fieldset>
    <legend>New</legend>
    <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>