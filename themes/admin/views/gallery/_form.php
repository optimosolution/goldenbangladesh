<?php
/* @var $this GalleryController */
/* @var $model Gallery */
/* @var $form CActiveForm */
?>
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'gallery-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
        ));
?>
<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php echo $form->errorSummary($model); ?>

<?php
echo $form->dropDownListControlGroup($model, 'district', CHtml::listData(District::model()->findAll(array('select' => 'id,title', 'condition' => 'published=1', "order" => "title")), 'id', 'title'), array(
    'ajax' => array(
        'type' => 'POST',
        'url' => CController::createUrl('gallery/dynamicthana'),
        'update' => '#Gallery_thana',
    ),
    'empty' => Yii::t('Common', 'please_select'),
    'class' => 'span5'
        )
);
?>
<?php echo $form->dropDownListControlGroup($model, 'thana', array(), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->dropDownListControlGroup($model, 'category_id', CHtml::listData(GalleryCategory::model()->findAll(array('condition' => 'published=1', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span5')); ?>
<?php echo $form->fileFieldControlGroup($model, 'picture', array('class' => 'span5')); ?>
<?php echo $form->textFieldControlGroup($model, 'caption', array('class' => 'span5', 'maxlength' => 100)); ?>
<?php echo $form->textFieldControlGroup($model, 'details', array('class' => 'span5', 'maxlength' => 255)); ?>
<?php echo $form->dropDownListControlGroup($model, 'published', array('1' => 'Yes', '0' => 'No'), array('class' => 'span3')); ?>
<div class="form-actions">
    <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
</div>
<?php $this->endWidget(); ?>