<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form TbActiveForm */
?>
<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data')
    ));
    ?>
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldControlGroup($model, 'name', array('span' => 5, 'maxlength' => 255)); ?>
    <?php //echo $form->textFieldControlGroup($model, 'username', array('span' => 5, 'maxlength' => 150)); ?>
    <?php //echo $form->textFieldControlGroup($model, 'email', array('span' => 5, 'maxlength' => 100)); ?>   
    <?php echo $form->textFieldControlGroup($model_profile, 'fathers_name', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldControlGroup($model_profile, 'mothers_name', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->labelEx($model, 'birth_date'); ?>
    <?php
    echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
        'language' => 'en',
        'model' => $model_profile, // Model object
        'attribute' => 'birth_date',
        'value' => $model_profile->birth_date,
        'options' => array(
            'mode' => 'datetime',
            'changeYear' => true,
            'changeMonth' => true,
            'yearRange' => '1920:2010',
            'dateFormat' => 'yy-mm-dd',
            'timeFormat' => 'HH:mm:ss',
            'showTimepicker' => true,
            'showAnim' => 'slide', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
        ),
        'htmlOptions' => array(
            'placeholder' => 'Date of birth',
            //'style' => 'width:260px !important;',
            'class' => 'span5',
        ),
            ), true);
    ?>
    <?php echo $form->DropDownListControlGroup($model_profile, 'blood_group', CHtml::listData(BloodGroup::model()->findAll(array('condition' => '', "order" => "")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <?php echo $form->DropDownListControlGroup($model_profile, 'gender', array('1' => 'Male', '0' => 'Female'), array('class' => 'span5')); ?>
    <?php echo $form->textFieldControlGroup($model_profile, 'spouse_name', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->DropDownListControlGroup($model_profile, 'relegion', CHtml::listData(Relegion::model()->findAll(array('condition' => '', "order" => "")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <?php echo $form->textFieldControlGroup($model_profile, 'phone', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldControlGroup($model_profile, 'mobile', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldControlGroup($model_profile, 'fax', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->textAreaControlGroup($model_profile, 'permanent_address', array('rows' => 2, 'span' => 5)); ?>
    <?php
    echo $form->dropDownListControlGroup($model_profile, 'district_id', CHtml::listData(District::model()->findAll(array('select' => 'id,title', 'condition' => 'published=1', "order" => "title")), 'id', 'title'), array(
        'ajax' => array(
            'type' => 'POST',
            'url' => CController::createUrl('user/dynamicthana'),
            'update' => '#UserProfile_thana_id',
        ),
        'empty' => Yii::t('Common', 'please_select'),
        'class' => 'span5'
            )
    );
    ?>
    <?php echo $form->dropDownListControlGroup($model_profile, 'thana_id', array(), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <?php echo $form->fileFieldControlGroup($model_profile, 'profile_picture', array('size' => 36, 'maxlength' => 255)); ?>
    <div class="form-actions">
        <?php
        echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_LARGE,
        ));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->