<?php
/* @var $this UserTypeController */
/* @var $model UserType */
?>

<?php
$this->pageTitle = 'User type details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'User Types' => array('admin'),
    $model->title,
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
);
?>
<fieldset>
    <legend><?php echo $model->title; ?></legend>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'htmlOptions' => array(
            'class' => 'table table-striped table-condensed table-hover',
        ),
        'data' => $model,
        'attributes' => array(
            'id',
            'title',
            'details',
        ),
    ));
    ?>
</fieldset>