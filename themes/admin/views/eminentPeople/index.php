<?php
/* @var $this EminentPeopleController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Eminent Peoples',
);

$this->menu=array(
	array('label'=>'Create EminentPeople','url'=>array('create')),
	array('label'=>'Manage EminentPeople','url'=>array('admin')),
);
?>

<h1>Eminent Peoples</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>