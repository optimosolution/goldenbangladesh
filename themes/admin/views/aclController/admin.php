<?php
$this->pageTitle = 'ACL Controllers - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'ACL Controllers' => array('admin'),
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
	$.fn.yiiGridView.update('acl-controller-grid', {
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
    'id' => 'acl-controller-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id',
            'type' => 'raw',
            'value' => '$data->id',
            'htmlOptions' => array('style' => "text-align:left; width:100px;", 'title' => 'ID'),
        ),
        array(
            'name' => 'controller',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->controller), array("aclAction/actions","cid"=>$data->id))',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Acceass'),
        ),
        array(
            'name' => 'title',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->title), array("aclAction/actions","cid"=>$data->id))',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Title'),
        ),
        array(
            'name' => 'controller_type',
            'value' => '$data->controller_type?Yii::t(\'app\',\'Backend\'):Yii::t(\'app\', \'Frontend\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Frontend'), '1' => Yii::t('app', 'Backend')),
            'htmlOptions' => array('style' => "text-align:left;"),
        ),
        array(
            'name' => 'status',
            'value' => '$data->status?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        array(
            'header' => 'Actions',
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'htmlOptions' => array('style' => 'text-align:right;'),
            'template' => '{email}',
            'htmlOptions' => array('style' => "text-align:center; width:80px;", 'title' => 'Set controller actions!'),
            'buttons' => array(
                'email' => array
                    (
                    'label' => 'Manage actions',
                    'imageUrl' => Yii::app()->theme->baseUrl . '/images/icon-hand-right.png',
                    'url' => 'Yii::app()->createUrl("aclAction/actions", array("cid"=>$data->id))',
                ),
            ),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
