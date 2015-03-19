<?php
$this->pageTitle = 'Golden Bangladesh Blog - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Golden Bangladesh Blog',
);
?>
<?php $this->get_blog_categories(); ?>
<fieldset>
    <legend>Blog category - <?php echo Blog::get_category_name($_GET['id']); ?></legend>
    <?php
    $this->widget('bootstrap.widgets.TbListView', array(
        'dataProvider' => $dataProvider,
        'itemView' => '_view_category',
    ));
    ?>
</fieldset>