<?php
/* @var $this FinanceiroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Financeiros',
);

$this->menu=array(
	array('label'=>'Create Financeiro', 'url'=>array('create')),
	array('label'=>'Manage Financeiro', 'url'=>array('admin')),
);
?>

<h1>Financeiros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
