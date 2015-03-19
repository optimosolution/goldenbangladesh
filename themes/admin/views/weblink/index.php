<?php
$this->breadcrumbs=array(
	'Weblinks',
);

$this->menu=array(
	array('label'=>'Create Weblink','url'=>array('create')),
	array('label'=>'Manage Weblink','url'=>array('admin')),
);
?>

<h1>Weblinks</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
