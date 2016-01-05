<?php
/* @var $this ClienteCarroController */
/* @var $model ClienteCarro */

$this->breadcrumbs=array(
	'Cliente Carros'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClienteCarro', 'url'=>array('index')),
	array('label'=>'Manage ClienteCarro', 'url'=>array('admin')),
);
?>

<h1>Cadastro de carro</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>