<?php
/* @var $this EminentPeopleController */
/* @var $model EminentPeople */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'eminent-people-form',
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

    <?php echo $form->textFieldControlGroup($model, 'full_name', array('span' => 5, 'maxlength' => 200)); ?>
    <?php
    echo $form->dropDownListControlGroup($model, 'district', CHtml::listData(District::model()->findAll(array('select' => 'id,title', 'condition' => 'published=1', "order" => "title")), 'id', 'title'), array(
        'ajax' => array(
            'type' => 'POST',
            'url' => CController::createUrl('eminentPeople/dynamicthana'),
            'update' => '#EminentPeople_thana',
        ),
        'empty' => '--please select--',
        'class' => 'span5'
            )
    );
    ?>
    <?php echo $form->dropDownListControlGroup($model, 'thana', array(), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <?php echo $form->textAreaControlGroup($model, 'address', array('rows' => 2, 'span' => 5)); ?>
    <?php echo $form->textFieldControlGroup($model, 'phone', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldControlGroup($model, 'mobile', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldControlGroup($model, 'email', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldControlGroup($model, 'website', array('span' => 5, 'maxlength' => 150)); ?>
    <?php echo $form->DropDownListControlGroup($model, 'eminent_type', CHtml::listData(EminentType::model()->findAll(array('condition' => 'published=1', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>    
    <?php echo $form->labelEx($model, 'life_style'); ?>   
    <?php $this->widget('application.extensions.widgets.redactorjs.Redactor', array('toolbar' => 'default', 'editorOptions' => array('autoresize' => false, 'fixed' => false), 'model' => $model, 'attribute' => 'life_style', 'htmlOptions' => array('style' => 'height:150px;',),)); ?>
    <?php echo $form->labelEx($model, 'rationale'); ?>   
    <?php $this->widget('application.extensions.widgets.redactorjs.Redactor', array('toolbar' => 'default', 'editorOptions' => array('autoresize' => false, 'fixed' => false), 'model' => $model, 'attribute' => 'rationale', 'htmlOptions' => array('style' => 'height:150px;',),)); ?>
    <?php echo $form->fileFieldControlGroup($model, 'profile_picture', array('size' => 36, 'maxlength' => 255)); ?>
    <div class="form-actions">
        <?php
        echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_LARGE,
            'icon' => TbHtml::ICON_PLUS,
        ));
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->