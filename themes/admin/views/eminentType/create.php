<?php
/* @var $this EminentTypeController */
/* @var $model EminentType */
?>

<?php
$this->breadcrumbs = array(
    'Eminent Types' => array('admin'),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
);
?>
<fieldset>
    <legend>New</legend>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>