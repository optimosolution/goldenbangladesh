<?php
/* @var $this DistrictController */
/* @var $model District */
?>

<?php
$this->pageTitle = 'District details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Districts' => array('admin'),
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
            array(
                'name' => 'country_id',
                'type' => 'raw',
                'value' => Country::getCountry($model->country_id),
            ),
            array(
                'name' => 'state_id',
                'type' => 'raw',
                'value' => State::getState($model->state_id),
            ),
            array(
                'name' => 'city_id',
                'type' => 'raw',
                'value' => City::getCity($model->city_id),
            ),
            'title',
            array(
                'name' => 'published',
                'value' => $model->published ? "Yes" : "No",
            ),
        ),
    ));
    ?>
</fieldset>