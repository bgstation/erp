<?php
/* @var $this DespesaController */
/* @var $model Despesa */

$this->breadcrumbs=array(
	'Despesas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Despesa', 'url'=>array('index')),
	array('label'=>'Create Despesa', 'url'=>array('create')),
	array('label'=>'Update Despesa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Despesa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Despesa', 'url'=>array('admin')),
);
?>

<h1>View Despesa #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tipo_despesas_id',
		'preco',
		'observacao',
		'quantidade',
		'data_hora',
		'usuario_id',
		'excluido',
	),
)); ?>
