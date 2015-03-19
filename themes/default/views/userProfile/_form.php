<?php
/* @var $this UserProfileController */
/* @var $model UserProfile */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-profile-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'user_id',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'profile_picture',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'country_id',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'state_id',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'city_id',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'district_id',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'thana_id',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'address',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->textFieldControlGroup($model,'mobile',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textFieldControlGroup($model,'phone',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textFieldControlGroup($model,'fax',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textFieldControlGroup($model,'website',array('span'=>5,'maxlength'=>150)); ?>

            <?php echo $form->textFieldControlGroup($model,'expiry',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'birth_date',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'fathers_name',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textFieldControlGroup($model,'mothers_name',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textFieldControlGroup($model,'blood_group',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'gender',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'spouse_name',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textFieldControlGroup($model,'relegion',array('span'=>5)); ?>

            <?php echo $form->textAreaControlGroup($model,'permanent_address',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textFieldControlGroup($model,'profession',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'designation',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textFieldControlGroup($model,'organization',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textAreaControlGroup($model,'office_address',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textFieldControlGroup($model,'highest_degree',array('span'=>5,'maxlength'=>250)); ?>

            <?php echo $form->textFieldControlGroup($model,'field_of_activity',array('span'=>5,'maxlength'=>250)); ?>

            <?php echo $form->textAreaControlGroup($model,'past_work_details',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textAreaControlGroup($model,'awards',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textAreaControlGroup($model,'social_activities',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textAreaControlGroup($model,'family_details',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textFieldControlGroup($model,'country_visited',array('span'=>5,'maxlength'=>250)); ?>

            <?php echo $form->textFieldControlGroup($model,'memorable_events',array('span'=>5,'maxlength'=>250)); ?>

            <?php echo $form->textFieldControlGroup($model,'hobby',array('span'=>5,'maxlength'=>250)); ?>

            <?php echo $form->textFieldControlGroup($model,'interest',array('span'=>5,'maxlength'=>250)); ?>

            <?php echo $form->textAreaControlGroup($model,'career_objective',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textAreaControlGroup($model,'computer_skill',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textAreaControlGroup($model,'training',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textAreaControlGroup($model,'other_activities',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textAreaControlGroup($model,'job_experience',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textFieldControlGroup($model,'present_salary',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'expected_salary',array('span'=>5)); ?>

            <?php echo $form->textFieldControlGroup($model,'looking_for',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textFieldControlGroup($model,'available_for',array('span'=>5,'maxlength'=>100)); ?>

            <?php echo $form->textAreaControlGroup($model,'previous_activities',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textAreaControlGroup($model,'present_plan',array('rows'=>6,'span'=>8)); ?>

            <?php echo $form->textFieldControlGroup($model,'user_type',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->