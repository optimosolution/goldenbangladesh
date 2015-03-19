<div class="view" style="margin-bottom: 20px;">
    <fieldset>
        <legend><?php echo CHtml::encode($data->name); ?></legend>
        <div class="row-fluid">
            <div class="span3">
                <?php $this->getUserPicture($data->id); ?>
            </div>
            <div class="span9">
                <div class="row-fluid">
                    <div class="span6">User ID</div>
                    <div class="span6">
                        <?php echo $data->id; ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">Fathers name</div>
                    <div class="span6">
                        <?php echo UserProfile::get_fathers_name($data->id); ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">Mothers name</div>
                    <div class="span6">
                        <?php echo UserProfile::get_mothers_name($data->id); ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">Profession</div>
                    <div class="span6">
                        <?php echo Profession::get_profession(UserProfile::get_profession($data->id)); ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">District</div>
                    <div class="span6">
                        <?php echo District::getDistrict(District::getDistrictBYUserid($data->id)); ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">Thana</div>
                    <div class="span6">
                        <?php echo Thana::getThana(Thana::getThanaBYUserid($data->id)); ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span9"></div>
                    <div class="span3">
                        <?php
                        echo TbHtml::linkButton('More details', array(
                            'color' => TbHtml::BUTTON_COLOR_INFO,
                            'size' => TbHtml::BUTTON_SIZE_MINI,
                            'url' => array('view', 'id' => $data->id),
                            'icon' => TbHtml::ICON_ZOOM_OUT,
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</div>