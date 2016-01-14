<?php
/* @var $this TipoProdutoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Produtos',
);

$this->menu=array(
	array('label'=>'Create TipoProduto', 'url'=>array('create')),
	array('label'=>'Manage TipoProduto', 'url'=>array('admin')),
);
?>

<h1>Tipo Produtos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
