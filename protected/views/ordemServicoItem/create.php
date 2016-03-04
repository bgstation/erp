<?php
/* @var $this OrdemServicoItemController */
/* @var $model OrdemServicoItem */

$this->breadcrumbs=array(
	'Ordem Servico Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrdemServicoItem', 'url'=>array('index')),
	array('label'=>'Manage OrdemServicoItem', 'url'=>array('admin')),
);
?>

<h1>Create OrdemServicoItem</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>