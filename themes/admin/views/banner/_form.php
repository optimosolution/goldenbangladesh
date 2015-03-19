<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'banner-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
?>
<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<?php
echo $form->dropDownListControlGroup($model, 'district', CHtml::listData(District::model()->findAll(array('select' => 'id,title', 'condition' => 'published=1', "order" => "title")), 'id', 'title'), array(
    'ajax' => array(
        'type' => 'POST',
        'url' => CController::createUrl('banner/dynamicthana'),
        'update' => '#Banner_thana',
    ),
    'empty' => Yii::t('Common', 'please_select'),
    'class' => 'span5'
        )
);
?>
<?php echo $form->dropDownListControlGroup($model, 'thana', array(), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->dropDownListControlGroup($model, 'catid', CHtml::listData(BannerCategory::model()->findAll(array('condition' => 'published=1', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->textFieldControlGroup($model, 'name', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->textFieldControlGroup($model, 'alias', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->fileFieldControlGroup($model, 'banner', array('class' => 'span5')); ?>
<?php echo $form->textFieldControlGroup($model, 'clickurl', array('class' => 'span5', 'maxlength' => 200)); ?>
<?php echo $form->textAreaControlGroup($model, 'description', array('rows' => 3, 'cols' => 50, 'class' => 'span5')); ?>
<?php echo $form->textFieldControlGroup($model, 'ordering', array('class' => 'span3')); ?>
<?php echo $form->dropDownListControlGroup($model, 'published', array('1' => 'Yes', '0' => 'No'), array('class' => 'span3')); ?>
<?php echo $form->dropDownListControlGroup($model, 'sticky', array('1' => 'Yes', '0' => 'No'), array('class' => 'span3')); ?>
<?php echo $form->labelEx($model, 'publish_up'); ?>
<?php
echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'language' => 'en',
    'model' => $model, // Model object
    'attribute' => 'publish_up',
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
        //'style' => 'width:460px !important;',
        'class' => 'span3',
        'class' => 'input' . ( $model->getError('registerDate') ? ' error' : '')
    ),
        ), true);
?>
<?php echo $form->labelEx($model, 'publish_down'); ?>
<?php
echo $form->widget('zii.widgets.jui.CJuiDatePicker', array(
    'language' => 'en',
    'model' => $model, // Model object
    'attribute' => 'publish_down',
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
        //'style' => 'width:460px !important;',
        'class' => 'span3',
        'class' => 'input' . ( $model->getError('registerDate') ? ' error' : '')
    ),
        ), true);
?>

<div class="form-actions">
    <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
</div>
<?php $this->endWidget(); ?>