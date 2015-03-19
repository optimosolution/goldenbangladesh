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
    <?php Edirectory::getCategory(); ?>
    <?php echo $form->textFieldControlGroup($model, 'title', array('span' => 5, 'maxlength' => 250)); ?>
    <?php echo $form->textFieldControlGroup($model, 'organization', array('span' => 5, 'maxlength' => 250)); ?>
    <?php echo $form->textAreaControlGroup($model, 'address', array('rows' => 2, 'span' => 5)); ?>
    <?php echo $form->textFieldControlGroup($model, 'telephone', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldControlGroup($model, 'mobile', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldControlGroup($model, 'email', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldControlGroup($model, 'fax', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldControlGroup($model, 'website', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->labelEx($model, 'details'); ?>
    <?php $this->widget('application.extensions.widgets.redactorjs.Redactor', array('toolbar' => 'mini', 'editorOptions' => array('autoresize' => false, 'fixed' => false), 'model' => $model, 'attribute' => 'details', 'htmlOptions' => array('style' => 'height:125px; width:400px;',),)); ?>
    <div class="row-fluid">
        <div class="span3">
            <?php
            echo $form->dropDownListControlGroup($model, 'district', CHtml::listData(District::model()->findAll(array('select' => 'id,title', 'condition' => 'published=1', "order" => "title")), 'id', 'title'), array(
                'ajax' => array(
                    'type' => 'POST',
                    'url' => CController::createUrl('edirectory/dynamicthana'),
                    'update' => '#Edirectory_thana',
                ),
                'empty' => '--please select--',
                'class' => 'span12'
                    )
            );
            ?>
        </div>
        <div class="span3">
            <?php echo $form->dropDownListControlGroup($model, 'thana', array(), array('empty' => '--please select--', 'class' => 'span12')); ?>
        </div>
        <div class="span6"></div>
    </div>            
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