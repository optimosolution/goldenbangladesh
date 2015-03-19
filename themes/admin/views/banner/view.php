<?php
$this->pageTitle = 'Banner details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Banners' => array('admin'),
    $model->name,
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
);
?>
<fieldset>
    <legend><?php echo $model->name; ?></legend>
    <?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'id',
            array(
                'name' => 'catid',
                'type' => 'raw',
                'value' => Banner:: getCategoryName($model->catid),
            ),
            'name',
            'alias',
            array(
                'name' => 'banner',
                'type' => 'raw',
                'value' => CHtml::image(Yii::app()->baseUrl . '/uploads/banners/' . $model->banner),
            ),
            'clickurl',
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
                'name' => 'sticky',
                'value' => $model->published ? "Yes" : "No",
            ),
            'ordering',
            array(
                'name' => 'created_on',
                'type' => 'raw', 'value' => date("F j, Y, g:i A", strtotime($model->created_on)),
            ),
            array(
                'name' => 'created_by',
                'type' => 'raw',
                'value' => Banner:: getUserName($model->created_by),
            ),
            array(
                'name' => 'publish_up',
                'type' => 'raw', 'value' => date("F j, Y, g:i A", strtotime($model->publish_up)),
            ),
            array(
                'name' => 'publish_down',
                'type' => 'raw', 'value' => date("F j, Y, g:i A", strtotime($model->publish_down)),
            ),
        ),
    ));
    ?>
</fieldset>