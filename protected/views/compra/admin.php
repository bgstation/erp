<?php
/* @var $this CompraController */
/* @var $model Compra */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Compras'
    ),
));
?>

<h1>Compras</h1>

<?php
//if (Yii::app()->user->checkAccess('cliente/create')) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'size' => 'medium',
        'label' => 'Cadastrar',
        'url' => Yii::app()->createUrl('compra/create'),
        'htmlOptions' => array(
            'class' => 'pull-left',
        ),
            )
    );
//}
?>
<br>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'compra-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nota_fiscal',
		'produto_id',
		'preco',
		'observacao',
		'quantidade',
		/*
		'data_hora',
		'usuario_id',
		'excluido',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
