<?php
/* @var $this TipoDespesaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Despesas',
);

$this->menu=array(
	array('label'=>'Create TipoDespesa', 'url'=>array('create')),
	array('label'=>'Manage TipoDespesa', 'url'=>array('admin')),
);
?>

<h1>Tipo Despesas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
