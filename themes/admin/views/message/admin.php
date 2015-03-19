<?php

/* @var $this MessageController */
/* @var $model Message */

$this->pageTitle = 'Messages - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Messages' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => '', 'class' => 'search-button', 'url' => '#', 'active' => true, 'icon' => 'icon-search search-button'),
);
?>


<?php

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'message-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'user_group',
            'type' => 'raw',
            'value' => 'UserGroup::get_user_group($data->user_group)',
            'filter' => CHtml::activeDropDownList($model, 'user_group', CHtml::listData(UserGroup::model()->findAll(array("order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'User Group'),
        ),
        array(
            'name' => 'user_type',
            'type' => 'raw',
            'value' => 'UserType::get_user_type($data->user_type)',
            'filter' => CHtml::activeDropDownList($model, 'user_type', CHtml::listData(UserType::model()->findAll(array("order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'User Type'),
        ),
        array(
            'name' => 'user_status',
            'type' => 'raw',
            'value' => 'UserStatus::get_user_status($data->user_status)',
            'filter' => CHtml::activeDropDownList($model, 'user_status', CHtml::listData(UserStatus::model()->findAll(array("order" => "status")), 'id', 'status'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'User Status'),
        ),
        'subject',
        array(
            'header' => 'Send',
            'type' => 'raw',
            'value' => 'CHtml::link("Send", array("send","id"=>$data->id))',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Send mail!'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>