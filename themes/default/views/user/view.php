<?php
$this->pageTitle = 'Profile details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    $model->name => array('view', 'id' => $model->id),
    'Profile details',
);
?>
<fieldset>
    <legend><?php echo $model->name; ?> - Profile</legend>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#tab1">Basic Information</a></li>
        <li><a data-toggle="tab" href="#tab2">Details profile</a></li>
    </ul>
    <div class="tab-content">
        <div id="tab1" class="tab-pane active">
            <?php
            $this->widget('zii.widgets.CDetailView', array(
                'htmlOptions' => array(
                    'class' => 'table table-striped table-condensed table-hover',
                ),
                'data' => $model,
                'attributes' => array(
                    'id',
                    'name',
                    'email',
                    array(
                        'name' => 'registerDate',
                        'type' => 'raw',
                        'value' => date("F j, Y, g:i A", strtotime($model->registerDate)),
                    ),
                    array(
                        'name' => 'lastvisitDate',
                        'type' => 'raw',
                        'value' => date("F j, Y, g:i A", strtotime($model->lastvisitDate)),
                    ),
                ),
            ));
            ?>  
        </div>
        <div id="tab2" class="tab-pane">
            <?php
            $this->widget('zii.widgets.CDetailView', array(
                'htmlOptions' => array(
                    'class' => 'table table-striped table-condensed table-hover',
                ),
                'data' => $model_profile,
                'attributes' => array(
                    array(
                        'name' => 'profile_picture',
                        'type' => 'raw',
                        'value' => CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $model_profile->profile_picture, $model->name, array("alt" => $model->name, "width" => "160", "title" => $model->name)),
                    ),
                    array(
                        'name' => 'country_id',
                        'type' => 'raw',
                        'value' => Country::getCountry($model_profile->country_id),
                    ),
                    array(
                        'name' => 'state_id',
                        'type' => 'raw',
                        'value' => State::getState($model_profile->state_id),
                    ),
                    array(
                        'name' => 'city_id',
                        'type' => 'raw',
                        'value' => City::getCity($model_profile->city_id),
                    ),
                    array(
                        'name' => 'district_id',
                        'type' => 'raw',
                        'value' => District::getDistrict($model_profile->district_id),
                    ),
                    array(
                        'name' => 'thana_id',
                        'type' => 'raw',
                        'value' => Thana::getThana($model_profile->thana_id),
                    ),
                    'address',
                    //'mobile',
                    'phone',
                    'fax',
                    'website',
                    //'expiry',
                    //'birth_date',
                    'fathers_name',
                    'mothers_name',
                    array(
                        'name' => 'blood_group',
                        'type' => 'raw',
                        'value' => BloodGroup::get_blood_group($model_profile->blood_group),
                    ),
                    array(
                        'name' => 'gender',
                        'value' => $model_profile->gender ? "Male" : "Female",
                    ),
                    'spouse_name',
                    array(
                        'name' => 'relegion',
                        'type' => 'raw',
                        'value' => Relegion::get_relegion($model_profile->relegion),
                    ),
                    'permanent_address',
                    array(
                        'name' => 'profession',
                        'type' => 'raw',
                        'value' => Profession::get_profession($model_profile->profession),
                    ),
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
                    array(
                        'name' => 'hear_about_us',
                        'type' => 'raw',
                        'value' => HearAboutUs::get_hear_about_us($model_profile->hear_about_us),
                    ),
                    array(
                        'name' => 'reference_id',
                        'type' => 'raw',
                        'value' => User::get_user_name($model_profile->reference_id),
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</fieldset>