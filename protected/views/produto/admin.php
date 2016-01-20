<?php
/* @var $this ProdutoController */
/* @var $model Produto */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Produtos'
    ),
));
?>

<h3>Produtos</h3>

<?php
if (Yii::app()->user->checkAccess('produto/create')) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'size' => 'medium',
        'label' => 'Cadastrar',
        'url' => Yii::app()->createUrl('produto/create'),
        'htmlOptions' => array(
            'class' => 'pull-left',
        ),
            )
    );
}
if (Yii::app()->user->checkAccess('tipoProduto/create')) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'size' => 'medium',
        'label' => 'Cadastrar tipo de produto',
        'url' => Yii::app()->createUrl('tipoProduto/create'),
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
    'id' => 'produto-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id',
            'value' => '$data->id',
            'htmlOptions'=>array('width'=>'100px'),
        ),
        array(
            'name' => 'tipo_produto_id',
            'value' => '!empty($data->tipo_produto_id) ? $data->tipoProduto->titulo : ""',
            'filter' => CHtml::activeDropDownList($model, 'tipo_produto_id', CHtml::listData($oTiposProdutos, 'id', 'titulo'), array(
                'empty' => '',
            )),
        ),
        'titulo',
        'codigo_barra',
        array(
            'name' => 'marca_id',
            'value' => '!empty($data->marca_id) ? $data->marca->titulo : ""'
        ),
        array(
            'name' => 'modelo_id',
            'value' => '!empty($data->modelo_id) ? $data->modelo->titulo : ""',
        ),
        array(
            'name' => 'preco',
            'value' => '!empty($data->preco) ? "R$ ". number_format($data->preco, 2, ",", ".") : ""'
        ),
        'quantidade',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("produto/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("produto/update")',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("produto/delete")',
                ),
            ),
        ),
    ),
));
?>
