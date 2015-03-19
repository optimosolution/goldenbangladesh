<?php
/* @var $this EminentTypeController */
/* @var $model EminentType */
?>

<?php
$this->breadcrumbs = array(
    'Eminent Types' => array('admin'),
    $model->title => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Details', 'url' => array('view', 'id' => $model->id), 'active' => true, 'icon' => 'icon-th-large'),
);
?>
<fieldset>
    <legend><?php echo $model->title; ?></legend>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>