<?php
/* @var $this EminentPeopleController */
/* @var $model EminentPeople */
?>

<?php
$this->pageTitle = 'Eminent People - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Eminent Peoples' => array('admin'),
    $model->full_name,
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
);
?>
<fieldset>
    <legend><?php echo $model->full_name; ?></legend>

    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'htmlOptions' => array(
            'class' => 'table table-striped table-condensed table-hover',
        ),
        'data' => $model,
        'attributes' => array(
            'id',
            array(
                'name' => 'profile_picture',
                'type' => 'raw',
                'value' => CHtml::image(Yii::app()->baseUrl . '/uploads/eminent_people/' . $model->profile_picture, $model->full_name, array("alt" => $model->full_name, 'class' => 'img-rounded', "width" => "220", "title" => $model->full_name)),
            ),
            'full_name',
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
            'address',
            'phone',
            'mobile',
            'email',
            'website',
            array(
                'name' => 'eminent_type',
                'type' => 'raw',
                'value' => EminentType::get_eminent_type($model->eminent_type),
            ),
            array(
                'name' => 'life_style',
                'type' => 'raw',
                'value' => $model->life_style,
            ),
            array(
                'name' => 'rationale',
                'type' => 'raw',
                'value' => $model->rationale,
            ),
            array(
                'name' => 'uploader_id',
                'type' => 'raw',
                'value' => User::get_user_name($model->uploader_id),
            ),
            array(
                'name' => 'published',
                'value' => $model->published ? "Yes" : "No",
            ),
        ),
    ));
    ?>
</fieldset>