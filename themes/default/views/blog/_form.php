<div class="form">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'blog-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldControlGroup($model, 'title', array('span' => 12, 'maxlength' => 255)); ?>
    <?php echo $form->labelEx($model, 'introtext'); ?>
    <?php $this->widget('application.extensions.widgets.redactorjs.Redactor', array('model' => $model, 'toolbar' => 'default', 'attribute' => 'introtext', 'editorOptions' => array('autoresize' => true),)); ?>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->dropDownListControlGroup($model, 'catid', CHtml::listData(BlogCategory::model()->findAll(array('condition' => 'published=1', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span12')); ?>
        </div>
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