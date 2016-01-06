<?php
/* @var $this AclRotaController */
/* @var $model AclRota */

$this->breadcrumbs=array(
	'Acl Rotas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AclRota', 'url'=>array('index')),
	array('label'=>'Manage AclRota', 'url'=>array('admin')),
);
?>

<h1>Create AclRota</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>