<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'content-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
<div class="row-fluid">
    <div class="span3">
        <?php echo $form->dropDownListControlGroup($model, 'catid', CHtml::listData(ContentCategory::model()->findAll(array('condition' => 'published=1', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span12')); ?>
    </div>
    <div class="span9">
        <?php echo $form->textFieldControlGroup($model, 'title', array('class' => 'span12', 'maxlength' => 255)); ?>
    </div>
</div>
<?php echo $form->labelEx($model, 'introtext'); ?>
<?php //$this->widget('application.extensions.widgets.redactorjs.Redactor', array('model' => $model, 'toolbar' => 'default', 'attribute' => 'introtext', 'editorOptions' => array('autoresize' => true),)); ?>
<?php
$this->widget(
        'ext.widgets.redactorjs.Redactor', array(
    'editorOptions' => array(
        'imageUpload' => Yii::app()->createAbsoluteUrl('/content/upload'),
        'imageGetJson' => Yii::app()->createAbsoluteUrl('/content/listimages')
    ),
    'model' => $model,
    'attribute' => 'introtext'));
?>
<?php //echo $form->labelEx($model, 'fulltext'); ?>
<?php //$this->widget('application.extensions.widgets.redactorjs.Redactor', array('model' => $model, 'toolbar' => 'default', 'attribute' => 'fulltext', 'editorOptions' => array('autoresize' => true),)); ?>
<?php
/*
  $this->widget(
  'ext.widgets.redactorjs.Redactor', array(
  'editorOptions' => array(
  'imageUpload' => Yii::app()->createAbsoluteUrl('/content/upload'),
  'imageGetJson' => Yii::app()->createAbsoluteUrl('/content/listimages')
  ),
  'model' => $model,
  'attribute' => 'fulltext'));
 */
?>
<div class="row-fluid">
    <div class="span2">
        <?php echo $form->dropDownListControlGroup($model, 'state', array('1' => 'Yes', '0' => 'No'), array('class' => 'span12')); ?>
    </div>
    <div class="span2">
        <?php echo $form->dropDownListControlGroup($model, 'featured', array('1' => 'Yes', '0' => 'No'), array('class' => 'span12')); ?>
    </div>
    <div class="span2">
        <?php echo $form->textFieldControlGroup($model, 'ordering', array('class' => 'span12')); ?>
    </div>
    <div class="span2">
        <?php
        echo $form->dropDownListControlGroup($model, 'district', CHtml::listData(District::model()->findAll(array('select' => 'id,title', 'condition' => 'published=1', "order" => "title")), 'id', 'title'), array(
            'ajax' => array(
                'type' => 'POST',
                'url' => CController::createUrl('content/dynamicthana'),
                'update' => '#Content_thana',
            ),
            'empty' => Yii::t('Common', 'please_select'),
            'class' => 'span12'
                )
        );
        ?>
    </div>
    <div class="span2">
        <?php echo $form->dropDownListControlGroup($model, 'thana', array(), array('empty' => '--please select--', 'class' => 'span12')); ?>
    </div>
</div>
<div class="row-fluid">
    <div class="span6">
        <?php echo $form->textAreaControlGroup($model, 'metakey', array('rows' => 2, 'cols' => 50, 'class' => 'span12')); ?>
    </div>
    <div class="span6">
        <?php echo $form->textAreaControlGroup($model, 'metadesc', array('rows' => 2, 'cols' => 50, 'class' => 'span12')); ?>
    </div>
</div>
<div class="form-actions">
    <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_INFO)); ?>
</div>

<?php $this->endWidget(); ?>
