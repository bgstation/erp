<?php
/* @var $this ModeloController */
/* @var $model Modelo */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Modelos'
    ),
));

?>

<h3>Modelos</h3>


<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'type' => 'primary',
    'size' => 'medium',
    'label' => 'Cadastrar',
    'url' => Yii::app()->createUrl('modelo/create'),
    'htmlOptions' => array(
        'class' => 'pull-left',
    ),
        )
);
?>
    <br>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'modelo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'titulo',
		'marca_id',
		'observacao',
		'excluido',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
