<?php
/* @var $this AclRotaController */
/* @var $model AclRota */

$this->breadcrumbs=array(
	'Acl Rotas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AclRota', 'url'=>array('index')),
	array('label'=>'Create AclRota', 'url'=>array('create')),
	array('label'=>'Update AclRota', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AclRota', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AclRota', 'url'=>array('admin')),
);
?>

<h1>View AclRota #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'controller',
		'action',
		'titulo',
		'descricao',
		'excluido',
	),
)); ?>
