<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs = array(
    'Users' => array('index'),
    'Create',
);
?>
<fieldset>
    <legend>User Registration</legend>
    <?php $this->renderPartial('_form', array('model' => $model, 'model_profile' => $model_profile)); ?>
</fieldset>