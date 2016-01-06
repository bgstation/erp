<?php
/* @var $this AclTipoUsuarioRotaController */
/* @var $model AclTipoUsuarioRota */

$this->breadcrumbs=array(
	'Acl Tipo Usuario Rotas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AclTipoUsuarioRota', 'url'=>array('index')),
	array('label'=>'Create AclTipoUsuarioRota', 'url'=>array('create')),
	array('label'=>'Update AclTipoUsuarioRota', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AclTipoUsuarioRota', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AclTipoUsuarioRota', 'url'=>array('admin')),
);
?>

<h1>View AclTipoUsuarioRota #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'acl_rota_id',
		'acl_tipo_usuario_id',
		'excluido',
		'data_insercao',
		'data_ultima_atualizacao',
	),
)); ?>
