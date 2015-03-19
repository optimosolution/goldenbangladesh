<?php
/* @var $this EminentPeopleController */
/* @var $model EminentPeople */
?>

<?php
$this->pageTitle = $model->full_name . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Eminent Peoples' => array('admin'),
    $model->full_name,
);
?>
<div class="row-fluid">    
    <div class="span12">
        <fieldset>
            <legend>Eminent People - <?php echo $model->full_name; ?></legend>
            <p>
                <?php
                $this->widget('application.extensions.addThis.addThis', array(
                    'id' => 'addThis',
                    'username' => 'saidurwd@gmail.com',
                    'defaultButtonCaption' => 'Share',
                    'showDefaultButton' => true,
                    'showDefaultButtonCaption' => true,
                    'separator' => '|',
                    'htmlOptions' => array(),
                    'linkOptions' => array(),
                    'showServices' => array('facebook', 'twitter', 'myspace', 'email', 'print'),
                    'showServicesTitle' => false,
                    'config' => array('ui_language' => 'en'),
                    'share' => array(),
                        )
                );
                ?>
            </p>
            <?php
            $this->widget('zii.widgets.CDetailView', array(
                'htmlOptions' => array(
                    'class' => 'table table-striped table-condensed table-hover',
                ),
                'data' => $model,
                'attributes' => array(
                    array(
                        'name' => 'profile_picture',
                        'type' => 'raw',
                        'value' => CHtml::image(Yii::app()->baseUrl . '/uploads/eminent_people/' . $model->profile_picture, $model->full_name, array("alt" => $model->full_name, 'class' => 'img-rounded', "width" => "320", "title" => $model->full_name)),
                    ),
                    array(
                        'name' => 'full_name',
                        'type' => 'raw',
                        'value' => $model->full_name,
                        'htmlOptions' => array('style' => "text-align:left;font-size:20px;"),
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
                ),
            ));
            ?>
        </fieldset>
    </div>
</div>