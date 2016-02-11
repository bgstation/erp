<?php
/* @var $this OrdemServicoItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ordem Servico Items',
);

$this->menu=array(
	array('label'=>'Create OrdemServicoItem', 'url'=>array('create')),
	array('label'=>'Manage OrdemServicoItem', 'url'=>array('admin')),
);
?>

<h1>Ordem Servico Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
