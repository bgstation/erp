<?php
/* @var $this FinanceiroController */
/* @var $model Financeiro */

$this->breadcrumbs=array(
	'Financeiros'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Financeiro', 'url'=>array('index')),
	array('label'=>'Manage Financeiro', 'url'=>array('admin')),
);
?>

<h1>Create Financeiro</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>