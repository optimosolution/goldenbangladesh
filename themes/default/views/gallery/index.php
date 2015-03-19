<?php
$this->pageTitle = Gallery::getCategoryName($_GET['id']) . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Gallery Categories' => array('category'),
    Gallery::getCategoryName($_GET['id']),
);
?>
<fieldset>
    <legend>Gallery Categories - <?php echo Gallery::getCategoryName($_GET['id']); ?></legend>
    <?php
    $this->widget('application.extensions.fancybox.EFancyBox', array(
        'target' => "a#newstore",
        'config' => array(
            'centerOnScroll' => true,
            'config' => array('openEffect' => 'elastic', 'closeEffect' => 'elastic'),
        ),
    ));

    $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
            //'htmlOptions' => array('class'=>'row-fluid'),
    ));
    ?>      
</fieldset>