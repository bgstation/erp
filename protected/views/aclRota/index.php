<?php
/* @var $this AclRotaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Acl Rotas',
);

$this->menu=array(
	array('label'=>'Create AclRota', 'url'=>array('create')),
	array('label'=>'Manage AclRota', 'url'=>array('admin')),
);
?>

<h1>Acl Rotas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
