<?php
/* @var $this EminentTypeController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Eminent Types',
);

$this->menu=array(
	array('label'=>'Create EminentType','url'=>array('create')),
	array('label'=>'Manage EminentType','url'=>array('admin')),
);
?>

<h1>Eminent Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>