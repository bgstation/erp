<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Cliente', 'url'=>array('index')),
	array('label'=>'Create Cliente', 'url'=>array('create')),
);

?>

<h1>Clientes</h1>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'cliente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'email',
		'nome',
		'cpf',
		'sexo',
		'telefone_fixo',
		/*
		'celular',
		'endereco',
		'numero',
		'complemento',
		'data_cadastro',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
