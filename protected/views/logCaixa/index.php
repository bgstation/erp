<?php
/* @var $this LogCaixaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Log Caixas',
);

$this->menu=array(
	array('label'=>'Create LogCaixa', 'url'=>array('create')),
	array('label'=>'Manage LogCaixa', 'url'=>array('admin')),
);
?>

<h1>Log Caixas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
