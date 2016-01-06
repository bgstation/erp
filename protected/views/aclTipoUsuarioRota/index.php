<?php
/* @var $this AclTipoUsuarioRotaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Acl Tipo Usuario Rotas',
);

$this->menu=array(
	array('label'=>'Create AclTipoUsuarioRota', 'url'=>array('create')),
	array('label'=>'Manage AclTipoUsuarioRota', 'url'=>array('admin')),
);
?>

<h1>Acl Tipo Usuario Rotas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
