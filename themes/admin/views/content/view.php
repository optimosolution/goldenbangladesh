<?php
$this->pageTitle = 'Content details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Contents' => array('admin'),
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
            'title',
            'alias',
            array(
                'name' => 'introtext',
                'type' => 'raw',
                'value' => $model->introtext,
                'htmlOptions' => array('style' => "text-align:left;"),
            ),
            array(
                'name' => 'fulltext',
                'type' => 'raw',
                'value' => $model->fulltext,
                'htmlOptions' => array('style' => "text-align:left;"),
            ),
            array(
                'name' => 'state',
                'value' => $model->state ? "Yes" : "No",
            ),
            array(
                'name' => 'catid',
                'type' => 'raw',
                'value' => $model->getCategoryName($model->catid),
            ),
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
                'name' => 'created_by',
                'type' => 'raw',
                'value' => $model->getUserName($model->created_by),
            ),
            array(
                'name' => 'created',
                'type' => 'raw',
                'value' => date("F j, Y, g:i A", strtotime($model->created)),
            ),
            array(
                'name' => 'modified_by',
                'type' => 'raw',
                'value' => $model->getUserName($model->modified_by),
            ),
            array(
                'name' => 'modified',
                'type' => 'raw',
                'value' => date("F j, Y, g:i A", strtotime($model->modified)),
            ),
            array(
                'name' => 'publish_up',
                'type' => 'raw',
                'value' => date("F j, Y, g:i A", strtotime($model->publish_up)),
            ),
            array(
                'name' => 'publish_down',
                'type' => 'raw',
                'value' => date("F j, Y, g:i A", strtotime($model->publish_down)),
            ),
            'ordering',
            'metakey',
            'metadesc',
            'hits',
            array(
                'name' => 'featured',
                'value' => $model->featured ? "Yes" : "No",
            ),
        ),
    ));
    ?>
</fieldset>