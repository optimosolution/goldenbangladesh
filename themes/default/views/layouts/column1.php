<?php
$this->beginContent('//layouts/main');
Yii::app()->clientScript->registerScript('search', "
    $('.carousel').carousel({
    interval: 5000
    })
");
Yii::app()->clientScript->registerScript('search', "
    $(document).ready(function() {
        $('.user_type').hide();
        $('#user_type').change(function() {
            $('.user_type').hide();
            $('.' + $(this).val()).show();
        }).triggerHandler('change');
    });
");
?>
<div class="row-fluid">
    <div class="span4">
        <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/images/gb_banner.png', 'Golden Bangladesh', array('style' => 'height:100px;')); ?>
    </div>
    <div class = "span8">

    </div>
</div>
<div class = "row-fluid">
    <div class = "span12">
        <?php
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'display' => null, // default is static to top
            'brandLabel' => '',
            //'brandLabel' => 'Golden Bangladesh',
            //'brandLabel' => CHtml::image(Yii::app()->theme->baseUrl . '/images/logo.png', 'Logo', array('style' => 'width:120px;')),
            //'brandUrl' => array('/site/index'),
            'collapse' => true, // requires bootstrap-responsive.css
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbNav',
                    'items' => array(
                        array('label' => 'Home', 'icon' => 'home', 'url' => array('/site/index')),
                        array('label' => 'About Us', 'url' => array('/content/view', 'id' => 1)),
                        array('label' => 'FAQs', 'url' => array('/content/view', 'id' => 2)),
                        array('label' => 'Profile', 'url' => array('/user/index')),
                        array('label' => 'Directory', 'url' => array('/edirectory/index'),
                            'items' => array(
                                array('label' => 'Directory categories', 'icon' => 'icon-th-list', 'url' => array('/edirectory/index')),
                                array('label' => 'New Entry', 'icon' => 'icon-plus', 'url' => array('/edirectory/new')),
                            ),),
                        array('label' => 'Gallery', 'url' => array('/gallery/category'),
                            'items' => array(
                                array('label' => 'Gallery categories', 'icon' => 'icon-th-list', 'url' => array('/gallery/category')),
                                array('label' => 'New Entry', 'icon' => 'icon-plus', 'url' => array('/gallery/new')),
                            ),),
                        array('label' => 'Video', 'url' => array('/youtube/index')),
                        array('label' => 'Blog', 'url' => array('/blog/index'),
                            'items' => array(
                                array('label' => 'All Blogs', 'icon' => 'icon-th-list', 'url' => array('/blog/index')),
                                array('label' => 'Write Blog', 'icon' => 'icon-plus', 'url' => array('/blog/new')),
                                array('label' => 'Write Problem & Possibility', 'icon' => 'icon-plus', 'url' => array('/content/new')),
                            ),),
                        array('label' => 'Register', 'url' => array('/user/create'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Links', 'url' => array('/weblink/index'),
                            'items' => array(
                                array('label' => 'All Weblinks', 'icon' => 'icon-th-list', 'url' => array('/weblink/index')),
                                array('label' => 'New Entry', 'icon' => 'icon-plus', 'url' => array('/weblink/new')),
                            ),),
                        array('label' => 'Eminent', 'url' => array('/eminentPeople/admin'),
                            'items' => array(
                                array('label' => 'Eminent People', 'icon' => 'icon-th-list', 'url' => array('/eminentPeople/admin')),
                                array('label' => 'New Entry', 'icon' => 'icon-plus', 'url' => array('/eminentPeople/create')),
                            ),),
                        array('label' => 'Contact', 'url' => array('/site/contact'),
                            'items' => array(
                                array('label' => 'Contact Us', 'icon' => 'icon-envelope', 'url' => array('/site/contact')),
                                array('label' => 'Feedback', 'icon' => 'icon-envelope', 'url' => array('/site/feedback')),
                                array('label' => 'Notice board', 'icon' => 'icon-list', 'url' => array('/content/index', 'id' => 14)),
                            ),),
                    ),
                ),
                array(
                    'class' => 'bootstrap.widgets.TbNav',
                    'htmlOptions' => array('class' => 'pull-right'),
                    'items' => array(
                        array('label' => $this->get_fullname(), 'icon' => 'icon-user', 'url' => '#', 'items' => array(
                                array('label' => 'My Profile', 'icon' => 'icon-fullscreen', 'url' => array('/user/view', 'id' => Yii::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'Profile Edit', 'icon' => 'icon-edit', 'url' => array('/user/update', 'id' => Yii::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'Change Password', 'icon' => 'icon-refresh', 'url' => array('/user/edit', 'id' => Yii::app()->user->id), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'Login', 'icon' => 'icon-ok', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                                array('label' => 'Logout (' . Yii::app()->user->name . ')', 'icon' => 'icon-off', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
                            )),
                    ),
                ),
            ),
        ));
        ?> 
    </div>
</div>
<div class="row-fluid">
    <div class="span12">
        <?php $this->get_banner(3); ?> 
    </div>
</div>
<div class="row-fluid" style="margin-top: 10px;">
    <div class="span3">   
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_directory_category(); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement_270(1); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_problem_latest(); ?>         
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement_270(5); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FGoldenBangladesh&amp;width=270&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=409526085754514" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px; height:290px;" allowTransparency="true"></iframe>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement_270(6); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_blog_latest(); ?>         
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement_270(7); ?>
            </div>
        </div>       
    </div>
    <div class="span7">
        <div class="row-fluid">
            <div class="span12">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
    <div class="span2">
        <div class="row-fluid">
            <div class="span12">
                <fieldset>
                    <legend><div class="fieldset_title">Search</div></legend>
                    <?php
                    $form_search = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                        'id' => 'user-form',
                        'action' => array('/user/index'),
                        'enableAjaxValidation' => false,
                    ));
                    $model = new User;
                    $model_profile = new UserProfile;
                    ?>                    
                    <div class="row-fluid">
                        <div class="span12">
                            <?php echo $form_search->DropDownList($model, 'user_type', array('1' => 'General People', '2' => 'Eminent People'), array('class' => 'span12', 'id' => 'user_type')); ?>
                        </div>
                    </div>
                    <div class="row-fluid user_type 2">
                        <div class="span12">
                            <?php echo $form_search->DropDownList($model, 'eminent_type', CHtml::listData(EminentType::model()->findAll(array('condition' => 'published=1', "order" => "title")), 'id', 'title', 'parent'), array('empty' => '--eminent type--', 'class' => 'span12')); ?>    
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <?php echo $form_search->textFieldControlGroup($model, 'name', array('span' => 12, 'maxlength' => 255, 'label' => false, 'placeholder' => 'Name')); ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <?php
                            echo $form_search->dropDownListControlGroup($model_profile, 'district_id', CHtml::listData(District::model()->findAll(array('select' => 'id,title', 'condition' => 'published=1', "order" => "title")), 'id', 'title'), array(
                                'ajax' => array(
                                    'type' => 'POST',
                                    'url' => CController::createUrl('user/dynamicthana'),
                                    'update' => '#UserProfile_thana_id',
                                ),
                                'empty' => '--select district--',
                                'class' => 'span12',
                                'label' => false,
                                'placeholder' => 'District',
                                    )
                            );
                            ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <?php echo $form_search->dropDownListControlGroup($model_profile, 'thana_id', array(), array('empty' => '--select thana--', 'class' => 'span12', 'label' => false, 'placeholder' => 'Thana')); ?>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <?php
                            echo TbHtml::submitButton('People Search', array(
                                'color' => TbHtml::BUTTON_COLOR_SUCCESS,
                                'size' => TbHtml::BUTTON_SIZE_DEFAULT,
                                'icon' => TbHtml::ICON_SEARCH,
                                'block' => true,
                            ));
                            ?>
                        </div>
                    </div>
                    <?php $this->endWidget(); ?>
                </fieldset>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement_170(8); ?>
            </div>
        </div>  
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_gallery_category(); ?>         
            </div>
        </div> 
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement_170(9); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <fieldset>
                    <legend><div class="fieldset_title">Latest Video</div></legend>                
                    <iframe width="170" height="155" src="//www.youtube.com/embed/<?php echo $this->get_youtube_video(); ?>" frameborder="0" allowfullscreen></iframe>
                    <?php
                    echo TbHtml::stackedPills(array(
                        array('label' => 'More video', 'url' => array('/youtube/index'), 'active' => true),
                    ));
                    ?>
                </fieldset>
            </div>
        </div> 
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement_170(10); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_web_links(); ?>         
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <?php $this->get_advertisement_170(11); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <a target="_blank" href="http://24counter.com/cc_stats/1391274584/"><img alt="web counter" border="0" src="http://24counter.com/online/ccc.php?id=1391274584" style="width: 170px;"></a>    
            </div>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>