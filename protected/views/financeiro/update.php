<?php
/* @var $this FinanceiroController */
/* @var $model Financeiro */

$this->breadcrumbs=array(
	'Financeiros'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Financeiro', 'url'=>array('index')),
	array('label'=>'Create Financeiro', 'url'=>array('create')),
	array('label'=>'View Financeiro', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Financeiro', 'url'=>array('admin')),
);
?>

<h1>Update Financeiro <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>