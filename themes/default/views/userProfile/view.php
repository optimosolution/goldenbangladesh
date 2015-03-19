<?php
/* @var $this UserProfileController */
/* @var $model UserProfile */
?>

<?php
$this->breadcrumbs=array(
	'User Profiles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserProfile', 'url'=>array('index')),
	array('label'=>'Create UserProfile', 'url'=>array('create')),
	array('label'=>'Update UserProfile', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserProfile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserProfile', 'url'=>array('admin')),
);
?>

<h1>View UserProfile #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'user_id',
		'profile_picture',
		'country_id',
		'state_id',
		'city_id',
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
		'u_degree',
		'u_institute',
		'u_subject',
		'u_passing_year',
		'c_degree',
		'c_institute',
		'c_subject',
		'c_passing_year',
		's_degree',
		's_institute',
		's_subject',
		's_passing_year',
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
	),
)); ?>