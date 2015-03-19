<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>
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
    <?php echo $form->textFieldControlGroup($model, 'username', array('class' => 'span12', 'placeholder' => 'Username', 'prepend' => '<i class="icon-user"></i>')); ?>
    <?php echo $form->passwordFieldControlGroup($model, 'password', array('class' => 'span12', 'placeholder' => 'Password', 'prepend' => '<i class="icon-share"></i>')); ?>
    <?php echo $form->checkboxControlGroup($model, 'rememberMe'); ?>    
    <?php
        echo TbHtml::submitButton('Login', array(
            'color' => TbHtml::BUTTON_COLOR_PRIMARY,
            'size' => TbHtml::BUTTON_SIZE_LARGE,
        ));
        ?>
    <?php $this->endWidget(); ?>
</div>