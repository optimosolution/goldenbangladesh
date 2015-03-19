<?php
/* @var $this WeblinkController */
/* @var $model Weblink */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'weblink-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->dropDownListControlGroup($model, 'category_id', CHtml::listData(WeblinkCategory::model()->findAll(array('condition' => 'published=1', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <?php echo $form->textFieldControlGroup($model, 'title', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldControlGroup($model, 'click_url', array('span' => 5, 'maxlength' => 250)); ?>
    <?php echo $form->textAreaControlGroup($model, 'description', array('rows' => 3, 'span' => 8)); ?>    
    <div class="row-fluid">
        <div class="span3">
            <?php
            echo $form->dropDownListControlGroup($model, 'district', CHtml::listData(District::model()->findAll(array('select' => 'id,title', 'condition' => 'published=1', "order" => "title")), 'id', 'title'), array(
                'ajax' => array(
                    'type' => 'POST',
                    'url' => CController::createUrl('weblink/dynamicthana'),
                    'update' => '#Weblink_thana',
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