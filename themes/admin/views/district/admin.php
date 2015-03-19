<?php
$this->pageTitle = 'Districts - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Districts' => array('admin'),
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
	$('#district-grid').yiiGridView('update', {
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
    'id' => 'district-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'country_id',
            'type' => 'raw',
            'value' => 'Country::getCountry($data->country_id)',
            'filter' => CHtml::activeDropDownList($model, 'country_id', CHtml::listData(Country::model()->findAll(array('condition' => '', "order" => "country_name")), 'id', 'country_name'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Country'),
        ),
        array(
            'name' => 'state_id',
            'type' => 'raw',
            'value' => 'State::getState($data->state_id)',
            'filter' => CHtml::activeDropDownList($model, 'state_id', CHtml::listData(State::model()->findAll(array('condition' => '', "order" => "state_name")), 'id', 'state_name'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'State'),
        ),
        array(
            'name' => 'city_id',
            'type' => 'raw',
            'value' => 'City::getCity($data->city_id)',
            'filter' => CHtml::activeDropDownList($model, 'city_id', CHtml::listData(City::model()->findAll(array('condition' => '', "order" => "city_name")), 'id', 'city_name'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'City'),
        ),
        'title',
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