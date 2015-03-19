<?php
$this->pageTitle = 'Golden Bangladesh Blog - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Golden Bangladesh Blog',
);
?>
<?php $this->get_blog_categories(); ?>
<fieldset>
    <legend>Golden Bangladesh Blog</legend>
    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view',
    ));
    ?>
</fieldset>