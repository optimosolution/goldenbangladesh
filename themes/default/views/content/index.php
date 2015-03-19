<?php
/* @var $this ContentController */
/* @var $dataProvider CActiveDataProvider */
$this->breadcrumbs = array(
    'Contents',
);
?>
<h3><?php echo $this->get_category_name($_GET['id']); ?></h3>
<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
