<?php
/* @var $this ClienteCarroController */
/* @var $model ClienteCarro */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Carros'
    ),
));
?>

<h1>Carros</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'cliente-carro-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'placa',
        'observacao',
        array(
            'name' => 'excluido',
            'value' => '$data->excluido? \'Sim\' : \'Não\''
        ),
    ),
));
?>
