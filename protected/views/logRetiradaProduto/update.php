<?php
/* @var $this LogRetiradaProdutoController */
/* @var $model LogRetiradaProduto */

$this->breadcrumbs=array(
	'Log Retirada Produtos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LogRetiradaProduto', 'url'=>array('index')),
	array('label'=>'Create LogRetiradaProduto', 'url'=>array('create')),
	array('label'=>'View LogRetiradaProduto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LogRetiradaProduto', 'url'=>array('admin')),
);
?>

<h1>Update LogRetiradaProduto <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>