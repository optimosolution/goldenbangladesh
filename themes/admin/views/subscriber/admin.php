<?php
$this->pageTitle = 'Subscribers - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Subscribers' => array('admin'),
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
	$.fn.yiiGridView.update('subscriber-grid', {
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
    'id' => 'subscriber-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id',
            'type' => 'raw',
            'value' => '$data->id',
            'htmlOptions' => array('style' => "text-align:center;width:80px;", 'title' => 'ID'),
        ),
        'full_name',
        array(
            'name' => 'email',
            'type' => 'raw',
            'value' => 'CHtml::mailto(CHtml::encode($data->email), $email=CHtml::encode($data->full_name)." <".CHtml::encode($data->email).">")',
            'htmlOptions' => array('style' => "text-align:left;", 'rel' => 'tooltip', 'data-original-title' => 'Email'),
        ),
        'created_on',
        array(
            'name' => 'confirmed',
            'value' => '$data->confirmed?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'htmlOptions' => array('style' => "text-align:center;width:100px;"),
        ),
        array(
            'name' => 'enabled',
            'value' => '$data->enabled?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'htmlOptions' => array('style' => "text-align:center;width:100px;"),
        ),
        array(
            'name' => 'accept',
            'value' => '$data->accept?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
            'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'htmlOptions' => array('style' => "text-align:center;width:100px;"),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
