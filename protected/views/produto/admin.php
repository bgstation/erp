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

<h1>Produtos</h1>

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
?>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'produto-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'titulo',
        array(
            'name' => 'marca_id',
            'value' => '!empty($data->marca_id) ? $data->marca->titulo : ""'
        ),
        array(
            'name' => 'tipo_produto_id',
            'value' => '!empty($data->tipo_produto_id) ? $data->tipoProduto->titulo : ""',
            'filter' => CHtml::activeDropDownList($model, 'tipo_produto_id', CHtml::listData($oTiposProdutos, 'id', 'titulo'), array(
                'empty' => '',
            )),
        ),
        array(
            'name' => 'preco',
            'value' => '!empty($data->preco) ? "R$ ". number_format($data->preco, 2, ",", ".") : ""'
        ),
        'quantidade',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{retirada}{view}{update}{delete}',
            'buttons' => array(
                'retirada' => array(
                    'label'=>'<i class="fa fa-minus-circle"></i>',
                    'options'=>array('title'=>'Retirar produto', 'style' => 'margin:0 5px 0 0;color:#313131;'),
                    'url' => 'Yii::app()->createUrl("produto/retirar", array("id" => $data->id))',
//                    'visible' => 'Yii::app()->user->checkAccess("produto/retirar")',
                ),
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
