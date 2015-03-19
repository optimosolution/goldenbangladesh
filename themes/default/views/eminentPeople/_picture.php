<?php
/* @var $this EminentPeopleController */
/* @var $model EminentPeople */
/* @var $form TbActiveForm */
?>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'eminent-people-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>
<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">
    <div class="span12">

    </div>
</div>
<div class="well">
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->textFieldControlGroup($model, 'title', array('span' => 12, 'maxlength' => 200)); ?>
        </div>
        <div class="span4">
            <?php echo $form->fileFieldControlGroup($model, 'picture', array('size' => 36, 'maxlength' => 255)); ?>
        </div>
        <div class="span2">
            <?php
            echo $form->labelEx($model, '&nbsp;');
            echo TbHtml::submitButton('Upload', array(
                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                'size' => TbHtml::BUTTON_SIZE_LARGE,
                'icon' => TbHtml::ICON_PLUS,
            ));
            ?>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>