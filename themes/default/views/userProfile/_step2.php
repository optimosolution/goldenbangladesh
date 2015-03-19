<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'user-profile-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->DropDownListControlGroup($model, 'profession', CHtml::listData(Profession::model()->findAll(array('condition' => '', "order" => "")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <?php echo $form->textFieldControlGroup($model, 'designation', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldControlGroup($model, 'organization', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textAreaControlGroup($model, 'office_address', array('rows' => 3, 'span' => 8)); ?>
    <?php echo $form->textFieldControlGroup($model, 'highest_degree', array('span' => 5, 'maxlength' => 250)); ?>
    <?php echo $form->textFieldControlGroup($model, 'field_of_activity', array('span' => 5, 'maxlength' => 250)); ?>
    <?php echo $form->textAreaControlGroup($model, 'past_work_details', array('rows' => 3, 'span' => 8)); ?>
    <?php echo $form->textAreaControlGroup($model, 'awards', array('rows' => 3, 'span' => 8)); ?>
    <?php echo $form->textAreaControlGroup($model, 'social_activities', array('rows' => 3, 'span' => 8)); ?>
    <?php echo $form->textAreaControlGroup($model, 'family_details', array('rows' => 3, 'span' => 8)); ?>
    <?php echo $form->textFieldControlGroup($model, 'country_visited', array('span' => 5, 'maxlength' => 250)); ?>
    <?php echo $form->textFieldControlGroup($model, 'memorable_events', array('span' => 5, 'maxlength' => 250)); ?>
    <div class="form-actions">
        <?php
        echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save & Next', array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_LARGE,
        ));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->