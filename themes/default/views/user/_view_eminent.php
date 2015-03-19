<div class="view" style="margin-bottom: 20px;">
    <fieldset>
        <legend><?php echo CHtml::encode($data->full_name); ?></legend>
        <div class="row-fluid">
            <div class="span3">
                <?php $this->getEminentPicture($data->id); ?>
            </div>
            <div class="span9">
                <div class="row-fluid">
                    <div class="span6">Name</div>
                    <div class="span6">
                        <?php echo $data->full_name; ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">Eminent Type</div>
                    <div class="span6">
                        <?php echo EminentType::get_eminent_type($data->eminent_type); ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">Address</div>
                    <div class="span6">
                        <?php echo $data->address; ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">District</div>
                    <div class="span6">
                        <?php echo District::getDistrict($data->district); ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">Thana</div>
                    <div class="span6">
                        <?php echo Thana::getThana($data->thana); ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span6">Uploaded By</div>
                    <div class="span6">
                        <?php echo User::get_user_name($data->uploader_id); ?>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span9"></div>
                    <div class="span3">
                        <?php
                        echo TbHtml::linkButton('More details', array(
                            'color' => TbHtml::BUTTON_COLOR_INFO,
                            'size' => TbHtml::BUTTON_SIZE_MINI,
                            'url' => array('/eminentPeople/view', 'id' => $data->id),
                            'icon' => TbHtml::ICON_ZOOM_OUT,
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</div>