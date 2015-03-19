<?php
/* @var $this DirectoryCategoryController */
/* @var $model DirectoryCategory */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'directory-category-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->labelEx($model, 'parent'); ?>
    <?php DirectoryCategory::getCategory(); ?>
    <?php echo $form->textFieldControlGroup($model, 'title', array('span' => 5, 'maxlength' => 250)); ?>
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