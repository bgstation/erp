<?php
/* @var $this TipoDespesaController */
/* @var $model TipoDespesa */

$this->breadcrumbs=array(
	'Tipo Despesas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TipoDespesa', 'url'=>array('index')),
	array('label'=>'Create TipoDespesa', 'url'=>array('create')),
	array('label'=>'Update TipoDespesa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TipoDespesa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoDespesa', 'url'=>array('admin')),
);
?>

<h1>View TipoDespesa #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'titulo',
	),
)); ?>
