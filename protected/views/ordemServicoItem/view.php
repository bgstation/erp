<?php
/* @var $this OrdemServicoItemController */
/* @var $model OrdemServicoItem */

$this->breadcrumbs=array(
	'Ordem Servico Items'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OrdemServicoItem', 'url'=>array('index')),
	array('label'=>'Create OrdemServicoItem', 'url'=>array('create')),
	array('label'=>'Update OrdemServicoItem', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrdemServicoItem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrdemServicoItem', 'url'=>array('admin')),
);
?>

<h1>View OrdemServicoItem #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'ordem_servico_id',
		'tipo_item_id',
		'item_id',
		'observacao',
		'excluido',
		'preco',
	),
)); ?>
