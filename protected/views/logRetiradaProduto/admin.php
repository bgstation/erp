<?php
/* @var $this LogRetiradaProdutoController */
/* @var $model LogRetiradaProduto */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Relatório' => '',
        'Retirada de produtos'
    ),
));
?>

<h1>Retirada de produtos</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'log-retirada-produto-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(
            'name' => 'produto_id',
            'value' => '!empty($data->produto_id) ? $data->produto->titulo : ""',
            'filter' => CHtml::activeDropDownList($model, 'produto_id', CHtml::listData($oProdutos, 'id', 'titulo'), array(
                'empty' => '',
            )),
        ),
        'quantidade',
        array(
            'name' => 'usuario_id',
            'value' => '!empty($data->usuario_id) ? $data->usuario->nome : ""',
            'filter' => CHtml::activeDropDownList($model, 'usuario_id', CHtml::listData($oUsuarios, 'id', 'nome'), array(
                'empty' => '',
            )),
        ),
        array(
            'name' => 'data_hora',
            'value' => '!empty($data->data_hora) ? date("d/m/Y H:i:s", strtotime($data->data_hora)) : ""'
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}',
            'buttons' => array(
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("logRetiradaProduto/view")',
                ),
            ),
        ),
    ),
));
?>
