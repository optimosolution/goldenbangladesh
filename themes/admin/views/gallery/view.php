<?php
/* @var $this GalleryController */
/* @var $model Gallery */
$this->pageTitle = 'Gallery picture details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Galleries' => array('admin'),
    $model->id,
);
$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
);
?>
<fieldset>
    <legend><?php echo $model->caption; ?></legend>
    <?php
    $this->widget('bootstrap.widgets.TbDetailView', array(
        'data' => $model,
        'attributes' => array(
            'id',
            array(
                'name' => 'district',
                'type' => 'raw',
                'value' => District::getDistrict($model->district),
            ),
            array(
                'name' => 'thana',
                'type' => 'raw',
                'value' => Thana::getThana($model->thana),
            ),
            array(
                'name' => 'category_id',
                'type' => 'raw',
                'value' => Gallery::getCategoryName($model->category_id),
            ),
            array(
                'name' => 'picture',
                'type' => 'raw',
                'value' => CHtml::image(Yii::app()->baseUrl . '/uploads/gallery/' . $model->picture),
            ),
            'caption',
            array(
                'name' => 'details',
                'type' => 'raw',
                'value' => $model->details,
                'htmlOptions' => array('style' => "text-align:left;"),
            ),
            array(
                'name' => 'created_on',
                'type' => 'raw', 'value' => date("F j, Y, g:i A", strtotime($model->created_on)),
            ),
            'created_by',
            'hits',
            array(
                'name' => 'published',
                'value' => $model->published ? "Yes" : "No",
            ),
        ),
    ));
    ?>
</fieldset>