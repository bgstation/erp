<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Clientes'
    ),
));
?>

<h1>Clientes</h1>

<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'type' => 'primary',
    'size' => 'medium',
    'label' => 'Cadastrar',
    'url' => Yii::app()->createUrl('cliente/create'),
    'htmlOptions' => array(
        'class' => 'pull-left',
    ),
        )
);
?>
    <br>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'cliente-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'nome',
        'email',
        'cpf',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
