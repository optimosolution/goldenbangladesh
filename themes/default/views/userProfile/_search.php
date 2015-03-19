<?php
/* @var $this UserProfileController */
/* @var $model UserProfile */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

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
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->