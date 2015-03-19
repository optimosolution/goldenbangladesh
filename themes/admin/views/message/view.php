<?php
/* @var $this MessageController */
/* @var $model Message */
?>

<?php
$this->pageTitle = 'Message details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Messages' => array('admin'),
    $model->subject,
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
);
?>
<fieldset>
    <legend><?php echo $model->subject; ?></legend>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'htmlOptions' => array(
            'class' => 'table table-striped table-condensed table-hover',
        ),
        'data' => $model,
        'attributes' => array(
            'id',
            array(
                'name' => 'user_group',
                'type' => 'raw',
                'value' => UserGroup::get_user_group($model->user_group),
            ),
            array(
                'name' => 'user_type',
                'type' => 'raw',
                'value' => UserType::get_user_type($model->user_type),
            ),
            array(
                'name' => 'user_status',
                'type' => 'raw',
                'value' => UserStatus::get_user_status($model->user_status),
            ),
            'subject',
            array(
                'name' => 'message_body',
                'type' => 'raw',
                'value' => $model->message_body,
            ),
            array(
                'name' => 'created_by',
                'type' => 'raw',
                'value' => UserAdmin::get_user_name($model->created_by),
            ),
            array(
                'name' => 'created_on',
                'type' => 'raw',
                'value' => date("F j, Y, g:i A", strtotime($model->created_on)),
            ),
            array(
                'name' => 'modified_by',
                'type' => 'raw',
                'value' => UserAdmin::get_user_name($model->modified_by),
            ),
            array(
                'name' => 'modified_on',
                'type' => 'raw',
                'value' => date("F j, Y, g:i A", strtotime($model->modified_on)),
            ),
            array(
                'name' => 'send_by',
                'type' => 'raw',
                'value' => UserAdmin::get_user_name($model->send_by),
            ),
            array(
                'name' => 'send_on',
                'type' => 'raw',
                'value' => date("F j, Y, g:i A", strtotime($model->send_on)),
            ),
        ),
    ));
    ?>
</fieldset>