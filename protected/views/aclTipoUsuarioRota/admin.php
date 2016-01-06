<?php
/* @var $this AclTipoUsuarioRotaController */
/* @var $model AclTipoUsuarioRota */

$this->breadcrumbs=array(
	'Acl Tipo Usuario Rotas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AclTipoUsuarioRota', 'url'=>array('index')),
	array('label'=>'Create AclTipoUsuarioRota', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#acl-tipo-usuario-rota-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Acl Tipo Usuario Rotas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'acl-tipo-usuario-rota-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'acl_rota_id',
		'acl_tipo_usuario_id',
		'excluido',
		'data_insercao',
		'data_ultima_atualizacao',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
