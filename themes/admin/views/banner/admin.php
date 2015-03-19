<?php
$this->pageTitle = 'Banners - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Banners' => array('admin'),
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
	$.fn.yiiGridView.update('banner-grid', {
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
    //'type' => 'striped bordered condensed',
    'id' => 'banner-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'district',
            'type' => 'raw',
            'value' => 'District::getDistrict($data->district)',
            'filter' => CHtml::activeDropDownList($model, 'district', CHtml::listData(District::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;width:100px;", 'title' => 'District'),
        ),
        array(
            'name' => 'thana',
            'type' => 'raw',
            'value' => 'Thana::getThana($data->thana)',
            'filter' => CHtml::activeDropDownList($model, 'thana', CHtml::listData(Thana::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;width:100px;", 'title' => 'Thana'),
        ),
        array(
            'name' => 'catid',
            'type' => 'raw',
            'value' => 'Banner::getCategoryName($data->catid)',
            'filter' => CHtml::activeDropDownList($model, 'catid', CHtml::listData(BannerCategory::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Category'),
        ),
        'name',
        'clickurl',
        'ordering',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
