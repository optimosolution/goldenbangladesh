<?php
$this->pageTitle = $model->title . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    Blog::get_category_name($model->catid) => array('category', 'id' => $model->catid),
    $model->title,
);
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=409526085754514";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php $this->get_blog_categories(); ?>
<div class="row-fluid">    
    <div class="span12">
        <fieldset>
            <legend><?php echo $model->title; ?></legend>            
            <div class="row-fluid"> 
                <div class="span4">
                    <?php echo '<strong>Category:</strong> ' . CHtml::link(CHtml::encode(Blog::get_category_name($model->catid)), array('category', 'id' => $model->catid), array('class' => 'cat_source')); ?>
                </div>
                <div class="span8">
                    <div class="news_date"><?php echo date("l, j F Y, g:i A", strtotime(CHtml::encode($model->created))); ?></div>
                </div>
            </div> 
            <hr style="height: 10px;" />
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
            <div class="row-fluid">    
                <div class="span12">
                    <?php echo $model->introtext; ?>
                </div>
            </div>
        </fieldset>    
        <div class="row-fluid">    
            <div class="span12">
                <div class="fb-comments" data-href="<?php echo 'http://www.goldenbangladesh.com/' . Yii::app()->request->url; ?>" data-width="870" data-num-posts="10"></div>
            </div>
        </div>        
    </div>
</div>