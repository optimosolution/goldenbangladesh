<?php
/* @var $this UserProfileController */
/* @var $data UserProfile */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile_picture')); ?>:</b>
	<?php echo CHtml::encode($data->profile_picture); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_id')); ?>:</b>
	<?php echo CHtml::encode($data->country_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state_id')); ?>:</b>
	<?php echo CHtml::encode($data->state_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::encode($data->city_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('district_id')); ?>:</b>
	<?php echo CHtml::encode($data->district_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('thana_id')); ?>:</b>
	<?php echo CHtml::encode($data->thana_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile')); ?>:</b>
	<?php echo CHtml::encode($data->mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax')); ?>:</b>
	<?php echo CHtml::encode($data->fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
	<?php echo CHtml::encode($data->website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expiry')); ?>:</b>
	<?php echo CHtml::encode($data->expiry); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birth_date')); ?>:</b>
	<?php echo CHtml::encode($data->birth_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fathers_name')); ?>:</b>
	<?php echo CHtml::encode($data->fathers_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mothers_name')); ?>:</b>
	<?php echo CHtml::encode($data->mothers_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('blood_group')); ?>:</b>
	<?php echo CHtml::encode($data->blood_group); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spouse_name')); ?>:</b>
	<?php echo CHtml::encode($data->spouse_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relegion')); ?>:</b>
	<?php echo CHtml::encode($data->relegion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('permanent_address')); ?>:</b>
	<?php echo CHtml::encode($data->permanent_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profession')); ?>:</b>
	<?php echo CHtml::encode($data->profession); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('designation')); ?>:</b>
	<?php echo CHtml::encode($data->designation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization')); ?>:</b>
	<?php echo CHtml::encode($data->organization); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('office_address')); ?>:</b>
	<?php echo CHtml::encode($data->office_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('highest_degree')); ?>:</b>
	<?php echo CHtml::encode($data->highest_degree); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field_of_activity')); ?>:</b>
	<?php echo CHtml::encode($data->field_of_activity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('past_work_details')); ?>:</b>
	<?php echo CHtml::encode($data->past_work_details); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('awards')); ?>:</b>
	<?php echo CHtml::encode($data->awards); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('social_activities')); ?>:</b>
	<?php echo CHtml::encode($data->social_activities); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('family_details')); ?>:</b>
	<?php echo CHtml::encode($data->family_details); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_visited')); ?>:</b>
	<?php echo CHtml::encode($data->country_visited); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('memorable_events')); ?>:</b>
	<?php echo CHtml::encode($data->memorable_events); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hobby')); ?>:</b>
	<?php echo CHtml::encode($data->hobby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('interest')); ?>:</b>
	<?php echo CHtml::encode($data->interest); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('career_objective')); ?>:</b>
	<?php echo CHtml::encode($data->career_objective); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('computer_skill')); ?>:</b>
	<?php echo CHtml::encode($data->computer_skill); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('training')); ?>:</b>
	<?php echo CHtml::encode($data->training); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('other_activities')); ?>:</b>
	<?php echo CHtml::encode($data->other_activities); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('job_experience')); ?>:</b>
	<?php echo CHtml::encode($data->job_experience); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('present_salary')); ?>:</b>
	<?php echo CHtml::encode($data->present_salary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expected_salary')); ?>:</b>
	<?php echo CHtml::encode($data->expected_salary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('looking_for')); ?>:</b>
	<?php echo CHtml::encode($data->looking_for); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('available_for')); ?>:</b>
	<?php echo CHtml::encode($data->available_for); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('previous_activities')); ?>:</b>
	<?php echo CHtml::encode($data->previous_activities); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('present_plan')); ?>:</b>
	<?php echo CHtml::encode($data->present_plan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_type')); ?>:</b>
	<?php echo CHtml::encode($data->user_type); ?>
	<br />

	*/ ?>

</div>