<?php
/* @var $this DespesaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Despesas',
);

$this->menu=array(
	array('label'=>'Create Despesa', 'url'=>array('create')),
	array('label'=>'Manage Despesa', 'url'=>array('admin')),
);
?>

<h1>Despesas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
