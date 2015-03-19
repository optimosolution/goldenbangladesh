<?php
/* @var $this UserProfileController */
/* @var $model UserProfile */


$this->breadcrumbs=array(
	'User Profiles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserProfile', 'url'=>array('index')),
	array('label'=>'Create UserProfile', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-profile-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Profiles</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-profile-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'profile_picture',
		'country_id',
		'state_id',
		'city_id',
		/*
		'district_id',
		'thana_id',
		'address',
		'mobile',
		'phone',
		'fax',
		'website',
		'expiry',
		'birth_date',
		'fathers_name',
		'mothers_name',
		'blood_group',
		'gender',
		'spouse_name',
		'relegion',
		'permanent_address',
		'profession',
		'designation',
		'organization',
		'office_address',
		'highest_degree',
		'field_of_activity',
		'past_work_details',
		'awards',
		'social_activities',
		'family_details',
		'country_visited',
		'memorable_events',
		'hobby',
		'interest',
		'career_objective',
		'computer_skill',
		'training',
		'other_activities',
		'job_experience',
		'present_salary',
		'expected_salary',
		'looking_for',
		'available_for',
		'previous_activities',
		'present_plan',
		'user_type',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>