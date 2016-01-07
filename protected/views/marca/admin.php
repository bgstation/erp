<?php
/* @var $this MarcaController */
/* @var $model Marca */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Marcas'
    ),
));
?>

<h3>Marcas</h3>

<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'type' => 'primary',
    'size' => 'medium',
    'label' => 'Cadastrar',
    'url' => Yii::app()->createUrl('marca/create'),
    'htmlOptions' => array(
        'class' => 'pull-left',
    ),
        )
);
?>
    <br>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'marca-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'titulo',
		'observacao',
		'excluido',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
