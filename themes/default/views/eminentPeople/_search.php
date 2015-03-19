<?php
/* @var $this EminentPeopleController */
/* @var $model EminentPeople */
/* @var $form CActiveForm */
?>

<div class="wide form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>
    <?php echo $form->textFieldControlGroup($model, 'address', array('span' => 5, 'maxlength' => 255)); ?>
    <?php echo $form->textFieldControlGroup($model, 'phone', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldControlGroup($model, 'mobile', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldControlGroup($model, 'email', array('span' => 5, 'maxlength' => 100)); ?>
    <?php echo $form->textFieldControlGroup($model, 'website', array('span' => 5, 'maxlength' => 150)); ?>
    <?php echo $form->textFieldControlGroup($model, 'eminent_type', array('span' => 5)); ?>
    <?php echo $form->textFieldControlGroup($model, 'uploader_id', array('span' => 5)); ?>
    <div class="form-actions">
        <?php echo TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY,)); ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- search-form -->