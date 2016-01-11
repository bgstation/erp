<?php
/* @var $this OrdemServicoController */
/* @var $model OrdemServico */

$this->breadcrumbs=array(
	'Ordem Servicos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OrdemServico', 'url'=>array('index')),
	array('label'=>'Create OrdemServico', 'url'=>array('create')),
	array('label'=>'Update OrdemServico', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrdemServico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrdemServico', 'url'=>array('admin')),
);
?>

<h1>View OrdemServico #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cliente_id',
		'cliente_carro_id',
		'forma_pagamento_id',
		'observacao',
		'excluido',
	),
)); ?>
