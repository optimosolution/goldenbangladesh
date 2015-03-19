<?php
$this->pageTitle = 'ACL action details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Acl Actions' => array('actions', 'cid' => $_GET['cid']),
    $model->action,
);

$this->menu = array(
    array('label' => 'Controllers', 'url' => array('aclController/admin'), 'active' => true, 'icon' => 'icon-arrow-up'),
    array('label' => 'Manage', 'url' => array('actions', 'cid' => $_GET['cid']), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create', 'cid' => $_GET['cid']), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id, 'cid' => $_GET['cid']), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id, 'cid' => $_GET['cid']), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
);
?>
<fieldset>
    <legend><?php echo $model->action; ?></legend>
    <?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'id',
            array(
                'name' => 'controller_id',
                'type' => 'raw',
                'value' => $model->getControllerName($model->controller_id),
            ),
            'action',
        ),
    ));
    ?>
</fieldset>