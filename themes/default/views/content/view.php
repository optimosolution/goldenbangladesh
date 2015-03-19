<?php
$this->pageTitle = $model->title . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    $model->title,
);
?>
<style>
    p{
        font-size: 16px;
        line-height: 25px;
    }
</style>
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
<fieldset>
    <legend><?php echo $model->title; ?></legend>
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
    <p><?php echo $model->introtext; ?></p>    
    <div style="clear: both;">&nbsp;</div>
    <div class="fb-comments" data-href="<?php echo 'http://www.goldenbangladesh.com/' . Yii::app()->request->url; ?>" data-width="870" data-num-posts="10"></div>
</fieldset>
