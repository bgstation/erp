<?php
/* @var $this ClienteCarroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cliente Carros',
);

$this->menu=array(
	array('label'=>'Create ClienteCarro', 'url'=>array('create')),
	array('label'=>'Manage ClienteCarro', 'url'=>array('admin')),
);
?>

<h1>Cliente Carros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
