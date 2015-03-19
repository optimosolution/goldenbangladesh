<?php
$this->pageTitle = 'Gallery category details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Gallery Categories' => array('admin'),
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
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'id',
            array(
                'name' => 'parent_id',
                'type' => 'raw',
                'value' => $model->getCategoryName($model->parent_id),
            ),
            'title',
            'alias',
            array(
                'name' => 'description',
                'type' => 'raw',
                'value' => $model->description,
                'htmlOptions' => array('style' => "text-align:left;"),
            ),
            array(
                'name' => 'published',
                'value' => $model->published ? "Yes" : "No",
            ),
            array(
                'name' => 'created_by',
                'type' => 'raw',
                'value' => $model->getUserName($model->created_by),
            ),
            array(
                'name' => 'created_time',
                'type' => 'raw',
                'value' => date("F j, Y, g:i A", strtotime($model->created_time)),
            ),
            array(
                'name' => 'modified_by',
                'type' => 'raw',
                'value' => $model->getUserName($model->modified_by),
            ),
            array(
                'name' => 'modified_time',
                'type' => 'raw',
                'value' => date("F j, Y, g:i A", strtotime($model->modified_time)),
            ),
        ),
    ));
    ?>
</fieldset>