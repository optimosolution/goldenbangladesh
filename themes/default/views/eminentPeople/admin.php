<?php
/* @var $this EminentPeopleController */
/* @var $model EminentPeople */
$this->pageTitle = 'Eminent Peoples - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Eminent Peoples' => array('admin'),
    'Manage',
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
<?php //echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn'));       ?>
<fieldset>
    <legend>Eminent Peoples</legend>
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
        'dataProvider' => $model->search_index(),
        'filter' => $model,
        'columns' => array(
            array(
                'name' => 'profile_picture',
                'type' => 'raw',
                'value' => 'CHtml::image(Yii::app()->baseUrl ."/uploads/eminent_people/" . $data->profile_picture,"",array("width"=>"120", "class" => "img-rounded"))',
            ),
            array(
                'name' => 'full_name',
                'type' => 'raw',
                'value' => 'CHtml::link(CHtml::encode($data->full_name), array("/eminentPeople/view","id"=>$data->id),array("target"=>"_blank"))',
                'htmlOptions' => array('style' => "text-align:left;font-size:16px;", 'title' => 'Eminent People'),
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
        ),
    ));
    ?>
</fieldset>