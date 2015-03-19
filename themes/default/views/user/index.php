<?php
$this->pageTitle = 'User profile - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'User profile',
);
?>
<fieldset>
    <legend>User profile</legend>
    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
    ));
    ?>
</fieldset>