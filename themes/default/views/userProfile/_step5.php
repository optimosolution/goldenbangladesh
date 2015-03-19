<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'user-profile-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.statecontent').hide();
            $('#hear_about').change(function() {
                $('.statecontent').hide();
                $('.' + $(this).val()).show();
            }).triggerHandler('change');
        });
    </script>    
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->textAreaControlGroup($model, 'previous_activities', array('rows' => 3, 'span' => 8)); ?>
    <?php echo $form->textAreaControlGroup($model, 'present_plan', array('rows' => 3, 'span' => 8)); ?>
    <div class = "row-fluid">
        <div class = "span4">
            <?php echo $form->DropDownListControlGroup($model, 'hear_about_us', CHtml::listData(HearAboutUs::model()->findAll(array('condition' => '', "order" => "title")), 'id', 'title'), array('empty' => '--please select--', 'class' => 'span12', 'id' => 'hear_about')); ?>
        </div>
        <div class = "span4 statecontent 1">
            <?php echo $form->textFieldControlGroup($model, 'reference_id', array('span' => 12, 'maxlength' => 250)); ?>            
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