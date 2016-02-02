<?php
/* @var $this LogCaixaController */
/* @var $model LogCaixa */

$this->breadcrumbs=array(
	'Log Caixas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LogCaixa', 'url'=>array('index')),
	array('label'=>'Create LogCaixa', 'url'=>array('create')),
	array('label'=>'View LogCaixa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage LogCaixa', 'url'=>array('admin')),
);
?>

<h1>Update LogCaixa <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>