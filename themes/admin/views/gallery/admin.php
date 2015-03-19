<?php
/* @var $this GalleryController */
/* @var $model Gallery */
$this->pageTitle = 'Gallery - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Galleries' => array('admin'),
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
	$('#gallery-grid').yiiGridView('update', {
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
    'id' => 'gallery-grid',
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
            'name' => 'category_id',
            'type' => 'raw',
            'value' => 'Gallery::getCategoryName($data->category_id)',
            'filter' => CHtml::activeDropDownList($model, 'category_id', CHtml::listData(GalleryCategory::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Category'),
        ),
        'caption',
        'created_on',
        array(
            'name' => 'published',
            'header' => "Status",
            'value' => '$data->published?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
