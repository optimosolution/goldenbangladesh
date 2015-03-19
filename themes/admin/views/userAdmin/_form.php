<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'user-admin-form',
    'enableAjaxValidation' => false,
        ));
?>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model); ?>
<?php echo $form->textFieldControlGroup($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'username', array('class' => 'span5', 'maxlength' => 150)); ?>
<?php echo $form->passwordFieldControlGroup($model, 'password', array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo $form->textFieldControlGroup($model, 'email', array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo $form->labelEx($model, 'registerDate'); ?>
<?php
echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'language' => 'en',
    'model' => $model, // Model object
    'attribute' => 'registerDate',
    'options' => array(
        'mode' => 'date',
        'changeYear' => true,
        'changeMonth' => true,
        'yearRange' => '1900:2200',
        'dateFormat' => 'yy-mm-dd',
        'timeFormat' => '',
        'showTimepicker' => false,
    ),
    'htmlOptions' => array(
        'placeholder' => 'Register Date',
        'style' => 'width:460px !important;',
        'class' => 'span5',
        'class' => 'input' . ( $model->getError('registerDate') ? ' error' : '')
    ),
        ), true);
?>
<?php echo $form->labelEx($model, 'lastvisitDate'); ?>
<?php
echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'language' => 'en',
    'model' => $model, // Model object
    'attribute' => 'lastvisitDate',
    'options' => array(
        'mode' => 'date',
        'changeYear' => true,
        'changeMonth' => true,
        'yearRange' => '1900:2200',
        'dateFormat' => 'yy-mm-dd',
        'timeFormat' => '',
        'showTimepicker' => false,
    ),
    'htmlOptions' => array(
        'placeholder' => 'Last Visit Date',
        'style' => 'width:460px !important;',
        'class' => 'span5',
        'class' => 'input' . ( $model->getError('lastvisitDate') ? ' error' : '')
    ),
        ), true);
?>
<?php echo $form->dropDownListControlGroup($model, 'group_id', CHtml::listData(UserGroup::model()->findAll(array("order" => "id")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
    <?php echo $form->dropDownListControlGroup($model, 'status', CHtml::listData(UserStatus::model()->findAll(array("order" => "status")), 'id', 'status'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<div class="form-actions">
    <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
</div>
<?php $this->endWidget(); ?>
