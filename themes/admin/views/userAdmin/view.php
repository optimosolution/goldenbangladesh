<?php
$this->pageTitle = 'Admin user details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Admin users' => array('admin'),
    $model->name,
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
    array('label' => 'Change Password', 'url' => array('edit', 'id' => $model->id), 'active' => true, 'icon' => 'icon-edit'),
);
?>
<fieldset>
    <legend><?php echo $model->name; ?></legend>
    <?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'id',
            'name',
            'username',
            array(
                'name' => 'email',
                'type' => 'raw',
                'value' => $model->email,
            ),
            array(
                'name' => 'registerDate',
                'type' => 'raw',
                'value' => date("F j, Y, g:i A", strtotime($model->registerDate)),
            ),
            array(
                'name' => 'lastvisitDate',
                'type' => 'raw',
                'value' => date("F j, Y, g:i A", strtotime($model->lastvisitDate)),
            ),
            array(
                'label' => 'Group',
                'value' => $model->getGroupName($model->group_id),
            ),
            array(
                'name' => 'status',
                'type' => 'raw',
                'value' => $model->UserStatus->status,
            ),
        ),
    ));
    ?>
</fieldset>