<?php
/* @var $this EminentPeopleController */
/* @var $model EminentPeople */

$this->pageTitle = 'Eminent Peoples - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Eminent Peoples' => array('admin'),
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
	$('#eminent-people-grid').yiiGridView('update', {
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
    'id' => 'eminent-people-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'full_name',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->full_name), array("/eminentPeople/view","id"=>$data->id),array("target"=>"_blank"))',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Eminent People'),
        ),
        array(
            'name' => 'eminent_type',
            'type' => 'raw',
            'value' => 'EminentType::get_eminent_type($data->eminent_type)',
            'filter' => CHtml::activeDropDownList($model, 'eminent_type', CHtml::listData(EminentType::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Eminent Type'),
        ),
        'address',
        'phone',
        'mobile',
        'email',
        array(
            'name' => 'published',
            'value' => '$data->published?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>