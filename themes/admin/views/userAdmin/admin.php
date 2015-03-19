<?php
$this->pageTitle = 'Admin users - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Admin users' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => '', 'class' => 'search-button', 'url' => '#', 'active' => true, 'icon' => 'icon-search search-button'),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-admin-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'type' => TbHtml::GRID_TYPE_HOVER,
    'id' => 'user-admin-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'name',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->name), array("view","id"=>$data->id))',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Name'),
        ),
        'username',
        array(
            'name' => 'email',
            'type' => 'raw',
            'value' => 'CHtml::mailto(CHtml::encode($data->email), $email=CHtml::encode($data->name)." <".CHtml::encode($data->email).">")',
            'htmlOptions' => array('style' => "text-align:left;", 'rel' => 'tooltip', 'data-original-title' => 'Email'),
        ),
        array(
            'name' => 'registerDate',
            'value' => 'date("d/m/y", strtotime($data->registerDate))',
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array('model' => $model, 'attribute' => 'registerDate', 'htmlOptions' => array('id' => 'datepicker1', 'size' => '10',), 'i18nScriptFile' => 'jquery.ui.datepicker-en.js', 'defaultOptions' => array('showOn' => 'focus', 'dateFormat' => 'yy-mm-dd', 'showOtherMonths' => true, 'selectOtherMonths' => true, 'changeMonth' => true, 'changeYear' => true, 'showButtonPanel' => false,)), true),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        array(
            'name' => 'lastvisitDate',
            'value' => 'date("d/m/y", strtotime($data->lastvisitDate))',
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array('model' => $model, 'attribute' => 'lastvisitDate', 'htmlOptions' => array('id' => 'datepicker2', 'size' => '10',), 'i18nScriptFile' => 'jquery.ui.datepicker-en.js', 'defaultOptions' => array('showOn' => 'focus', 'dateFormat' => 'yy-mm-dd', 'showOtherMonths' => true, 'selectOtherMonths' => true, 'changeMonth' => true, 'changeYear' => true, 'showButtonPanel' => false,)), true),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        array(
            'header' => 'Group',
            'name' => 'title',
            'type' => 'raw',
            'filter' => CHtml::activeDropDownList($model, 'group_id', CHtml::listData(UserGroup::model()->findAll(array("order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'value' => '$data->UserGroup->title',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Group'),
        ),
        array(
            'name' => 'status',
            'type' => 'raw',
            'filter' => CHtml::activeDropDownList($model, 'status', CHtml::listData(UserStatus::model()->findAll(array("order" => "status")), 'id', 'status'), array('empty' => 'All')),
            'value' => '$data->UserStatus->status',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Status'),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>