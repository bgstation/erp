<?php
/* @var $this ClienteCarroController */
/* @var $model ClienteCarro */

$this->breadcrumbs=array(
	'Cliente Carros'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClienteCarro', 'url'=>array('index')),
	array('label'=>'Create ClienteCarro', 'url'=>array('create')),
	array('label'=>'View ClienteCarro', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClienteCarro', 'url'=>array('admin')),
);
?>

<h1>Update ClienteCarro <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>