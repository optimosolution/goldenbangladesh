<?php
/* @var $this EdirectoryController */
/* @var $model Edirectory */

$this->pageTitle = 'Edirectories - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Edirectories' => array('admin'),
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
	$('#edirectory-grid').yiiGridView('update', {
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
    'id' => 'edirectory-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id',
            'type' => 'raw',
            'value' => '$data->id',
            'htmlOptions' => array('style' => "text-align:center;width:80px;", 'title' => 'ID'),
        ),
        array(
            'name' => 'category',
            'type' => 'raw',
            'value' => 'DirectoryCategory::getDirectoryCategory($data->category)',
            'filter' => CHtml::activeDropDownList($model, 'category', CHtml::listData(DirectoryCategory::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;width:150px;", 'title' => 'Category'),
        ),
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
        'title',
        'organization',
        'telephone',
        'mobile',
        'email',
        array(
            'name' => 'published',
            'header' => "Status",
            'value' => '$data->published?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
            'htmlOptions' => array('style' => "text-align:center;width:100px;"),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>