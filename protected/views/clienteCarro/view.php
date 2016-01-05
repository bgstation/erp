<?php
/* @var $this ClienteCarroController */
/* @var $model ClienteCarro */

$this->breadcrumbs=array(
	'Cliente Carros'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClienteCarro', 'url'=>array('index')),
	array('label'=>'Create ClienteCarro', 'url'=>array('create')),
	array('label'=>'Update ClienteCarro', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClienteCarro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClienteCarro', 'url'=>array('admin')),
);
?>

<h1>View ClienteCarro #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'placa',
		'marca_carro_id',
		'cliente_id',
		'observacao',
		'excluido',
	),
)); ?>
