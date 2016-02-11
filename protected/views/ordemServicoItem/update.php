<?php
/* @var $this OrdemServicoItemController */
/* @var $model OrdemServicoItem */

$this->breadcrumbs=array(
	'Ordem Servico Items'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrdemServicoItem', 'url'=>array('index')),
	array('label'=>'Create OrdemServicoItem', 'url'=>array('create')),
	array('label'=>'View OrdemServicoItem', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage OrdemServicoItem', 'url'=>array('admin')),
);
?>

<h1>Update OrdemServicoItem <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>