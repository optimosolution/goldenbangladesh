<?php $this->pageTitle = 'Admin Login - ' . Yii::app()->name; ?>
<div style="width: 340px; margin: auto;">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'login-form',
        //'type' => 'horizontal',
        //'type' => 'inline',
        'enableClientValidation' => true,
        'htmlOptions' => array('class' => 'well'),
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>
    <fieldset>
        <legend>Admin Login</legend>
        <?php echo $form->textField($model, 'username', array('class' => 'span3', 'placeholder' => 'Username/Email', 'prepend' => '<i class="icon-user"></i>')); ?>
        <?php echo $form->passwordField($model, 'password', array('class' => 'span3', 'placeholder' => 'Password', 'prepend' => '<i class="icon-share"></i>')); ?>
        <?php echo $form->checkBoxControlGroup($model, 'rememberMe'); ?>
    </fieldset>
    <?php echo TbHtml::submitButton('Sign in', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>
    <?php echo TbHtml::resetButton('Reset', array('color' => TbHtml::BUTTON_COLOR_DEFAULT)); ?>
    <?php $this->endWidget(); ?>
</div>
