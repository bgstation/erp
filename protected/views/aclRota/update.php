<?php
/* @var $this AclRotaController */
/* @var $model AclRota */

$this->breadcrumbs=array(
	'Acl Rotas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AclRota', 'url'=>array('index')),
	array('label'=>'Create AclRota', 'url'=>array('create')),
	array('label'=>'View AclRota', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage AclRota', 'url'=>array('admin')),
);
?>

<h1>Update AclRota <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>