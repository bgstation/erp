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
?>
<br>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'produto-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'titulo',
        'codigo_barra',
        'marca_id',
        'modelo_id',
        'preco',
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
