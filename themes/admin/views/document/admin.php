<?php
$this->pageTitle = 'Documents - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Documents' => array('admin'),
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
	$.fn.yiiGridView.update('document-grid', {
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
    'id' => 'document-grid',
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
            'name' => 'catid',
            'type' => 'raw',
            'value' => 'DocumentCategory::getCategoryName($data->catid)',
            'filter' => CHtml::activeDropDownList($model, 'catid', CHtml::listData(DocumentCategory::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Document Category'),
        ),
        array(
            'name' => 'title',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->title),array("document/download","id"=>$data->id))',
        ),
        'doc_type',
        array(
            'name' => 'doc_size',
            'header' => "Size",
            'value' => 'Document::byteToMbyte($data->doc_size)',
        ),
        array(
            'name' => 'published',
            'value' => '$data->published?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        array(
            'header' => 'Actions',
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
