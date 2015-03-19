<?php
$this->pageTitle = 'User groups - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'User Groups' => array('admin'),
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
	$.fn.yiiGridView.update('user-group-grid', {
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
    'id' => 'user-group-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id',
            'type' => 'raw',
            'value' => '$data->id',
            'htmlOptions' => array('style' => "text-align:left; width:100px;", 'title' => 'ID'),
        ),
        'title',
        'details',
        array(
            'header' => 'Access',
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'htmlOptions' => array('style' => 'text-align:right;'),
            'template' => '{email}',
            'htmlOptions' => array('style' => "text-align:center; width:80px;", 'title' => 'Set Access!'),
            'buttons' => array(
                'email' => array
                    (
                    'label' => 'Set Access',
                    'imageUrl' => Yii::app()->theme->baseUrl . '/images/icon-hand-right.png',
                    'url' => 'Yii::app()->createUrl("acl/edit", array("id"=>$data->id))',
                ),
            ),
        ),
        array(
            'header' => 'Actions',
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
