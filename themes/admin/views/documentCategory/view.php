<?php
$this->pageTitle = 'Document category details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Document Categories' => array('admin'),
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
                'name' => 'parent',
                'type' => 'raw',
                'value' => DocumentCategory::getCategoryName($model->parent),
            ),
            'title',
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
                'value' => $this->getUserNameByID($model->created_by),
            ),
            array(
                'name' => 'created_time',
                'type' => 'raw',
                'value' => date("F j, Y, g:i A", strtotime($model->created_time)),
            ),
            array(
                'name' => 'modified_by',
                'type' => 'raw',
                'value' => $this->getUserNameByID($model->modified_by),
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