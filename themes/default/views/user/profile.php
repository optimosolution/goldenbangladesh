<?php
$this->pageTitle = 'Profile - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Users' => array('profile'),
    'Profile',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<fieldset>
    <legend>User profile</legend>
    <?php //echo CHtml::link('Advanced Search', '#', array('class' => 'search-button btn')); ?>
    <div class="search-form" style="display:none">
        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>
    </div><!-- search-form -->

    <?php
    $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'user-grid',
        'dataProvider' => $model->search_profile(),
        'filter' => $model,
        'columns' => array(
            'name',
            'username',
            'email',
        ),
    ));
    ?>
</fieldset>