<?php
$this->pageTitle = 'Subscriber details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Subscribers' => array('admin'),
    $model->email,
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
);
?>
<fieldset>
    <legend><?php echo $model->email; ?></legend>
    <?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'id',
            'full_name',
            'email',
            'user_id',
            array(
                'name' => 'created_on',
                'type' => 'raw',
                'value' => date("F j, Y, g:i A", strtotime($model->created_on)),
            ),
            array(
                'name' => 'confirmed',
                'value' => $model->confirmed ? "Yes" : "No",
            ),
            array(
                'name' => 'enabled',
                'value' => $model->enabled ? "Yes" : "No",
            ),
            array(
                'name' => 'accept',
                'value' => $model->accept ? "Yes" : "No",
            ),
            'key',
        ),
    ));
    ?>
</fieldset>