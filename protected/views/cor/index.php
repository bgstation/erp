<?php
/* @var $this CorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cors',
);

$this->menu=array(
	array('label'=>'Create Cor', 'url'=>array('create')),
	array('label'=>'Manage Cor', 'url'=>array('admin')),
);
?>

<h1>Cors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
