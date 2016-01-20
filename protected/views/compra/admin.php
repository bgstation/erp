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
if (Yii::app()->user->checkAccess('compra/create')) {
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
}
?>
<br>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'compra-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id',
            'value' => '$data->id',
            'htmlOptions'=>array('width'=>'100px'),
        ),
        'nota_fiscal',
        array(
            'name' => 'produto_id',
            'value' => '!empty($data->produto_id) ? $data->produto->titulo : ""',
            'filter' => CHtml::activeDropDownList($model, 'produto_id', CHtml::listData($oProdutos, 'id', 'titulo'), array(
                'empty' => '',
            )),
        ),
        array(
            'name' => 'preco',
            'value' => '!empty($data->preco) ? "R$ ". number_format($data->preco, 2, ",", ".") : ""'
        ),
        'observacao',
        array(
            'name' => 'quantidade',
            'value' => '$data->quantidade',
            'htmlOptions'=>array('width'=>'100px'),
        ),
        array(
            'name' => 'data_hora',
            'value' => '!empty($data->data_hora) ? date("d/m/Y H:i:s", strtotime($data->data_hora)) : ""'
        ),
        array(
            'name' => 'usuario_id',
            'value' => '!empty($data->usuario_id) ? $data->usuario->nome : ""',
            'filter' => CHtml::activeDropDownList($model, 'usuario_id', CHtml::listData($oUsuarios, 'id', 'nome'), array(
                'empty' => '',
            )),
        ),
        /*
          'data_hora',
          'usuario_id',
          'excluido',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("compra/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("compra/update")',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("compra/delete")',
                ),
            ),
        ),
    ),
));
?>
