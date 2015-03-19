<?php
/* @var $this EminentPeopleController */
/* @var $model EminentPeople */
?>

<?php
$this->pageTitle = 'Edit Eminent People - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Eminent Peoples' => array('admin'),
    $model->full_name => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Details', 'url' => array('view', 'id' => $model->id), 'active' => true, 'icon' => 'icon-th-large'),
);
?>
<fieldset>
    <legend><?php echo $model->full_name; ?></legend>
    <?php $this->renderPartial('_form', array('model' => $model)); ?>
</fieldset>