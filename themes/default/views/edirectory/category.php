<?php
$this->pageTitle = Edirectory::getCategoryName($_GET['id']) . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Directories' => array('/directory/index'),
    Edirectory::getCategoryName($_GET['id']),
);
?>
<div class="row-fluid">
    <div class="span12">
        <h3><?php echo Edirectory::getCategoryName($_GET['id']); ?></h3>
    </div>
</div>
<div class="row-fluid">
    <div class="span10">
        <div class="ditectory_title">Categories</div>
        <hr />
        <?php $this->getDirectoryCatbyID($_GET['id']); ?>
        <div class="ditectory_title">Listings</div>
        <hr />
        <?php
        $this->widget('bootstrap.widgets.TbListView', array(
            'dataProvider' => $dataProvider,
            'itemView' => '_view',
        ));
        ?>
    </div>
    <div class="span2"></div>
</div>
