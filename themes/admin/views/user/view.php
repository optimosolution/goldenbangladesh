<?php
$this->pageTitle = 'User details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Users' => array('admin'),
    $model->name,
);

$this->menu = array(
    array('label' => 'Manage', 'url' => array('admin'), 'active' => true, 'icon' => 'icon-home'),
    array('label' => 'New', 'url' => array('create'), 'active' => true, 'icon' => 'icon-file'),
    array('label' => 'Edit', 'url' => array('update', 'id' => $model->id), 'active' => true, 'icon' => 'icon-pencil'),
    array('label' => 'Delete', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?'), 'active' => true, 'icon' => 'icon-remove'),
    array('label' => 'Change Password', 'url' => array('edit', 'id' => $model->id), 'active' => true, 'icon' => 'icon-edit'),
);
?>
<fieldset>
    <legend><?php echo $model->name; ?></legend>
    <div class="widget-box">
        <div class="widget-title">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">Basic</a></li>
                <li><a data-toggle="tab" href="#tab2">Profile</a></li>
            </ul>
        </div>
        <div class="widget-content tab-content">
            <div id="tab1" class="tab-pane active">
                <?php
                $this->widget('bootstrap.widgets.TbDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                        'id',
                        'name',
                        'username',
                        array(
                            'name' => 'email',
                            'type' => 'raw',
                            'value' => $model->email,
                        ),
                        array(
                            'name' => 'registerDate',
                            'type' => 'raw',
                            'value' => date("F j, Y, g:i A", strtotime($model->registerDate)),
                        ),
                        array(
                            'name' => 'lastvisitDate',
                            'type' => 'raw',
                            'value' => date("F j, Y, g:i A", strtotime($model->lastvisitDate)),
                        ),
                        array(
                            'label' => 'Group',
                            'value' => $model->getGroupName($model->group_id),
                        ),
                        array(
                            'name' => 'status',
                            'type' => 'raw',
                            'value' => $model->UserStatus->status,
                        ),
                    ),
                ));
                ?>
            </div>        
            <div id="tab2" class="tab-pane">
                <?php
                $this->widget('bootstrap.widgets.TbDetailView', array(
                    'data' => $model_profile,
                    'attributes' => array(
                        array(
                            'name' => 'profile_picture',
                            'type' => 'raw',
                            'value' => CHtml::image('../../uploads/profile_picture/' . $model_profile->profile_picture, "", array("width" => "150")),
                        ),
                        array(
                            'name' => 'country_id',
                            'type' => 'raw',
                            'value' => Country::getCountry($model_profile->country_id),
                        ),
                        array(
                            'name' => 'state_id',
                            'type' => 'raw',
                            'value' => State::getState($model_profile->state_id),
                        ),
                        array(
                            'name' => 'city_id',
                            'type' => 'raw',
                            'value' => City::getCity($model_profile->city_id),
                        ),
                        'address',
                        'mobile',
                        'phone',
                        'fax',
                        'website',
                        'expiry',
                        'birth_date',
                        array(
                            'name' => 'hear_about_us',
                            'type' => 'raw',
                            'value' => HearAboutUs::get_hear_about_us($model_profile->hear_about_us),
                        ),
                        array(
                            'name' => 'reference_id',
                            'type' => 'raw',
                            'value' => User::get_user_name($model_profile->reference_id),
                        ),
                    ),
                ));
                ?>
            </div>
        </div>
    </div>
</fieldset>