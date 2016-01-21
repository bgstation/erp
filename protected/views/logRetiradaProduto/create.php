<?php
/* @var $this LogRetiradaProdutoController */
/* @var $model LogRetiradaProduto */

$this->breadcrumbs=array(
	'Log Retirada Produtos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LogRetiradaProduto', 'url'=>array('index')),
	array('label'=>'Manage LogRetiradaProduto', 'url'=>array('admin')),
);
?>

<h1>Create LogRetiradaProduto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>