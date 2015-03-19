<?php
$this->pageTitle = 'Edit ACL action - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'ACL Actions' => array('actions', 'cid' => $_GET['cid']),
    'Update',
);

$this->menu = array(
    array('label' => 'Controllers', 'url' => array('aclController/admin'), 'active' => true, 'icon' => 'icon-arrow-up'),
    array('label' => 'Manage', 'url' => array('actions', 'cid' => $_GET['cid']), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create', 'cid' => $_GET['cid']), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Details', 'url' => array('view', 'id' => $model->id, 'cid' => $_GET['cid']), 'active' => true, 'icon' => 'icon-th-large'),
);
?>
<fieldset>
    <legend><?php echo $model->action; ?></legend>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>