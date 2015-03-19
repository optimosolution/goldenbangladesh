<?php
$this->pageTitle = 'Cities - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Cities' => array('admin'),
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
	$.fn.yiiGridView.update('city-grid', {
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
    'id' => 'city-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'country_id',
            'type' => 'raw',
            'value' => 'getCountryName($data->country_id)',
            'filter' => CHtml::activeDropDownList($model, 'country_id', CHtml::listData(Country::model()->findAll(array('condition' => '', "order" => "country_name")), 'id', 'country_name'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Country'),
        ),
        array(
            'name' => 'state_id',
            'type' => 'raw',
            'value' => 'getStateName($data->state_id)',
            'filter' => CHtml::activeDropDownList($model, 'state_id', CHtml::listData(State::model()->findAll(array('condition' => '', "order" => "state_name")), 'id', 'state_name'), array('empty' => 'All')),
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'State'),
        ),
        'city_name',
        'city_3_code',
        'city_2_code',
        'ordering',
        array(
            'name' => 'published',
            'value' => '$data->published?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
            'htmlOptions' => array('style' => "text-align:center;"),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));

/**
 * Retrieves Country name by ID.
 * @return string.
 */
function getCountryName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('country_name')
            ->from('{{country}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();

    return $returnValue;
}

/**
 * Retrieves State name by ID.
 * @return string.
 */
function getStateName($id) {
    $returnValue = Yii::app()->db->createCommand()
            ->select('state_name')
            ->from('{{state}}')
            ->where('id=:id', array(':id' => $id))
            ->queryScalar();

    return $returnValue;
}
?>
