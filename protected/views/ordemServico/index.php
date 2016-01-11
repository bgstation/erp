<?php
/* @var $this OrdemServicoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ordem Servicos',
);

$this->menu=array(
	array('label'=>'Create OrdemServico', 'url'=>array('create')),
	array('label'=>'Manage OrdemServico', 'url'=>array('admin')),
);
?>

<h1>Ordem Servicos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
