<?php
/* @var $this AclTipoUsuarioRotaController */
/* @var $model AclTipoUsuarioRota */

$this->breadcrumbs=array(
	'Acl Tipo Usuario Rotas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AclTipoUsuarioRota', 'url'=>array('index')),
	array('label'=>'Manage AclTipoUsuarioRota', 'url'=>array('admin')),
);
?>

<h1>Create AclTipoUsuarioRota</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>