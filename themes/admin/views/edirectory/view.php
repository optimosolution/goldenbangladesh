<?php
/* @var $this EdirectoryController */
/* @var $model Edirectory */
?>

<?php
$this->pageTitle = 'Directory details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Edirectories' => array('admin'),
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
                'name' => 'category',
                'type' => 'raw',
                'value' => DirectoryCategory::getDirectoryCategory($model->category),
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
            'title',
            'organization',
            'address',
            'telephone',
            'mobile',
            'email',
            'fax',
            'website',
            'details',
            array(
                'name' => 'created_by',
                'type' => 'raw',
                'value' => UserAdmin::getName($model->created_by),
            ),
            array(
                'name' => 'created_on',
                'type' => 'raw',
                'value' => date("F j, Y, g:i A", strtotime($model->created_on)),
            ),
            array(
                'name' => 'modified_by',
                'type' => 'raw',
                'value' => UserAdmin::getName($model->modified_by),
            ),
            array(
                'name' => 'modified_on',
                'type' => 'raw',
                'value' => date("F j, Y, g:i A", strtotime($model->modified_on)),
            ),
            array(
                'name' => 'published',
                'value' => $model->published ? "Yes" : "No",
            ),
        ),
    ));
    ?>
</fieldset>