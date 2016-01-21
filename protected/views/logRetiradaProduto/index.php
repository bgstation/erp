<?php
/* @var $this LogRetiradaProdutoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Log Retirada Produtos',
);

$this->menu=array(
	array('label'=>'Create LogRetiradaProduto', 'url'=>array('create')),
	array('label'=>'Manage LogRetiradaProduto', 'url'=>array('admin')),
);
?>

<h1>Log Retirada Produtos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
