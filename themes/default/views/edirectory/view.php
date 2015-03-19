<?php
$this->pageTitle = $model->title . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Directories' => array('index'),
    Edirectory::getCategoryName($model->category) => array('/edirectory/category', 'id' => Edirectory::getCategoryID($model->id)),
    $model->title,
);
?>
<div class="row-fluid">
    <div class="span8">
        <div class="row-fluid">
            <div class="span12">
                <div class="ditectory_title"><?php echo $model->title; ?></div>
            </div>
        </div>        
        <div class="row-fluid">
            <div class="span12">
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
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php
                $this->widget('bootstrap.widgets.TbDetailView', array(
                    'type' => 'striped bordered condensed',
                    'data' => $model,
                    'attributes' => array(
                        array(
                            'name' => 'category',
                            'type' => 'raw',
                            'value' => Edirectory::getCategoryName($model->category),
                        ),
                        'title',
                        array(
                            'name' => 'details',
                            'type' => 'raw',
                            'value' => $model->details,
                            'htmlOptions' => array('style' => "text-align:left;"),
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
                            'name' => 'created_on',
                            'type' => 'raw',
                            'value' => date("F j, Y, g:i A", strtotime($model->created_on)),
                        ),
                        array(
                            'name' => 'modified_on',
                            'type' => 'raw',
                            'value' => date("F j, Y, g:i A", strtotime($model->modified_on)),
                        ),
                        'address',
                        'mobile',
                        'telephone',
                        'fax',
                        'email',
                        'website',
                    ),
                ));
                ?>
            </div>
        </div>        
    </div>
    <div class="span4">
        <?php $this->get_directory_related($model->category); ?>
    </div>
</div>