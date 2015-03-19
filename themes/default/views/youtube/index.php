<?php
$this->pageTitle = 'Hollywood Bangla Tube - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Hollywood Bangla Tube',
);
?>
<fieldset>
    <legend>Golden Bangladesh Videos</legend>
    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
    ));
    ?>
</fieldset>