<?php
/* @var $this EdirectoryController */
/* @var $model Edirectory */
/* @var $form TbActiveForm */
?>
<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'edirectory-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->labelEx($model, 'category'); ?>
    <?php Edirectory::getCategoryUpdate($model->category); ?>
    <?php
    echo $form->dropDownListControlGroup($model, 'district', CHtml::listData(District::model()->findAll(array('select' => 'id,title', 'condition' => 'published=1', "order" => "title")), 'id', 'title'), array(
        'ajax' => array(
            'type' => 'POST',
            'url' => CController::createUrl('edirectory/dynamicthana'),
            'update' => '#Edirectory_thana',
        ),
        'empty' => Yii::t('Common', 'please_select'),
        'class' => 'span5'
            )
    );
    ?>
    <?php echo $form->dropDownListControlGroup($model, 'thana', array(), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <?php //echo $form->dropDownListControlGroup($model, 'district', CHtml::listData(District::model()->findAll(array('condition' => 'published=1', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <?php //echo $form->dropDownListControlGroup($model, 'thana', CHtml::listData(Thana::model()->findAll(array('condition' => 'published=1', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <?php echo $form->textFieldControlGroup($model, 'title', array('span' => 5, 'maxlength' => 250)); ?>
    <?php echo $form->textFieldControlGroup($model, 'organization', array('span' => 5, 'maxlength' => 250)); ?>
    <?php echo $form->textAreaControlGroup($model, 'address', array('rows' => 2, 'span' => 5)); ?>
    <?php echo $form->textFieldControlGroup($model, 'telephone', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldControlGroup($model, 'mobile', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldControlGroup($model, 'email', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldControlGroup($model, 'fax', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldControlGroup($model, 'website', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->labelEx($model, 'details'); ?>
    <?php $this->widget('application.extensions.widgets.redactorjs.Redactor', array('model' => $model, 'attribute' => 'details', 'editorOptions' => array('autoresize' => true),)); ?>
    <?php echo $form->dropDownListControlGroup($model, 'published', array('1' => 'Yes', '0' => 'No')); ?>
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