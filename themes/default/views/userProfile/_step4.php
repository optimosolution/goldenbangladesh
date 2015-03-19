<div class="form">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'user-profile-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <p class="help-block">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>
    <fieldset>
        <legend>Education:<br />University</legend>
        <div class = "row-fluid">
            <div class = "span4">
                <?php echo $form->textFieldControlGroup($model, 'u_degree', array('span' => 12)); ?>
            </div>
            <div class = "span4">
                <?php echo $form->textFieldControlGroup($model, 'u_institute', array('span' => 12)); ?>
            </div>
        </div>
        <div class = "row-fluid">
            <div class = "span4">
                <?php echo $form->textFieldControlGroup($model, 'u_subject', array('span' => 12)); ?>
            </div>
            <div class = "span4">
                <?php echo $form->textFieldControlGroup($model, 'u_passing_year', array('span' => 12)); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>College</legend>
        <div class = "row-fluid">
            <div class = "span4">
                <?php echo $form->textFieldControlGroup($model, 'c_degree', array('span' => 12)); ?>
            </div>
            <div class = "span4">
                <?php echo $form->textFieldControlGroup($model, 'c_institute', array('span' => 12)); ?>
            </div>
        </div>
        <div class = "row-fluid">
            <div class = "span4">
                <?php echo $form->textFieldControlGroup($model, 'c_subject', array('span' => 12)); ?>
            </div>
            <div class = "span4">
                <?php echo $form->textFieldControlGroup($model, 'c_passing_year', array('span' => 12)); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>School</legend>
        <div class = "row-fluid">
            <div class = "span4">
                <?php echo $form->textFieldControlGroup($model, 's_degree', array('span' => 12)); ?>
            </div>
            <div class = "span4">
                <?php echo $form->textFieldControlGroup($model, 's_institute', array('span' => 12)); ?>
            </div>
        </div>
        <div class = "row-fluid">
            <div class = "span4">
                <?php echo $form->textFieldControlGroup($model, 's_subject', array('span' => 12)); ?>
            </div>
            <div class = "span4">
                <?php echo $form->textFieldControlGroup($model, 's_passing_year', array('span' => 12)); ?>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <legend>Career Information</legend>
        <?php echo $form->textAreaControlGroup($model, 'career_objective', array('rows' => 3, 'span' => 8)); ?>
        <?php echo $form->textAreaControlGroup($model, 'computer_skill', array('rows' => 3, 'span' => 8)); ?>
        <?php echo $form->textAreaControlGroup($model, 'training', array('rows' => 3, 'span' => 8)); ?>
        <?php echo $form->textAreaControlGroup($model, 'other_activities', array('rows' => 3, 'span' => 8)); ?>
        <?php echo $form->textAreaControlGroup($model, 'job_experience', array('rows' => 3, 'span' => 8)); ?>
        <div class = "row-fluid">
            <div class = "span4">
                <?php echo $form->textFieldControlGroup($model, 'present_salary', array('span' => 12)); ?>
            </div>
            <div class = "span4">
                <?php echo $form->textFieldControlGroup($model, 'expected_salary', array('span' => 12)); ?>
            </div>
        </div>
        <div class = "row-fluid">
            <div class = "span4">
                <?php echo $form->dropDownListControlGroup($model, 'looking_for', array('Entry Level Job' => 'Entry Level Job', 'Mid/Managerial Level Job' => 'Mid/Managerial Level Job', 'Top Level Job' => 'Top Level Job'), array('empty' => '--please select--', 'class' => 'span12')); ?>
            </div>
            <div class = "span4">
                <?php echo $form->dropDownListControlGroup($model, 'available_for', array('Full Time' => 'Full Time', 'Part Time' => 'Part Time', 'Contract' => 'Contract'), array('empty' => '--please select--', 'class' => 'span12')); ?>
            </div>
        </div>
    </fieldset>
    <div class="form-actions">
        <?php
        echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save & Next', array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_LARGE,
        ));
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->