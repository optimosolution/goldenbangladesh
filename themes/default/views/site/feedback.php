<?php
/* @var $this SiteController */
/* @var $model FeedbackForm */
/* @var $form TbActiveForm */

$this->pageTitle = 'Feedback - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Feedback',
);
?>
<fieldset>
    <legend>Feedback</legend>
    <p>
        If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
    </p>
    <div class="form">
        <?php
        $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'feedback-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>
        <p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php echo $form->errorSummary($model); ?>
        <div class="row-fluid">
            <div class="span8">
                <?php echo $form->textFieldControlGroup($model, 'name', array('class' => 'span12')); ?>
                <?php echo $form->textFieldControlGroup($model, 'email', array('class' => 'span12')); ?>
                <?php echo $form->textFieldControlGroup($model, 'subject', array('class' => 'span12')); ?>
            </div>
            <div class="span4">
                <strong>Address: </strong><br />
                Golden Associates, House#6 (Ground Floor)<br />
                Road-1, Sector-4, Uttara<br />
                Dhaka, 1230<br />
                Bangladesh.<br />                
                <strong>E-mail: </strong>goldenassociates@gmail.com<br />
                <strong>Telephone: </strong>8951233<br />
                <strong>Mobile: </strong>+880 1911 485949 
            </div>
        </div>
        <?php echo $form->textAreaControlGroup($model, 'body', array('rows' => 6, 'class' => 'span12')); ?>
        <div class="form-actions">
            <?php
            echo TbHtml::submitButton('Submit', array(
                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                'size' => TbHtml::BUTTON_SIZE_LARGE,
            ));
            ?>
        </div>
        <?php $this->endWidget(); ?>
    </div><!-- form -->
</fieldset>