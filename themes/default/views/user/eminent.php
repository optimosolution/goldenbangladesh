<?php
$this->pageTitle = 'Eminent People - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Eminent People',
);
?>
<fieldset>
    <legend>Eminent People</legend>
    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view_eminent',
    ));
    ?>
</fieldset>