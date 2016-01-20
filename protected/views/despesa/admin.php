<?php
/* @var $this DespesaController */
/* @var $model Despesa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Despesas'
    ),
));
?>

<h1>Despesas</h1>

<?php
if (Yii::app()->user->checkAccess('despesa/create')) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'size' => 'medium',
        'label' => 'Cadastrar',
        'url' => Yii::app()->createUrl('despesa/create'),
        'htmlOptions' => array(
            'class' => 'pull-left',
        ),
            )
    );
}
?>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'despesa-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'tipo_despesa_id',
            'value' => '!empty($data->tipo_despesa_id) ? $data->tipoDespesa->titulo : ""',
            'filter' => CHtml::activeDropDownList($model, 'tipo_despesa_id', CHtml::listData($oTiposDespesa, 'id', 'titulo'), array(
                'empty' => '',
            )),
        ),
        array(
            'name' => 'preco',
            'value' => '!empty($data->preco) ? "R$ ". number_format($data->preco, 2, ",", ".") : ""'
        ),
        'quantidade',
        array(
            'name' => 'data_hora',
            'value' => '!empty($data->data_hora) ? date("d/m/Y H:i:s", strtotime($data->data_hora)) : ""'
        ),
//        array(
//            'name' => 'usuario_id',
//            'value' => '!empty($data->usuario_id) ? $data->usuario->nome : ""',
//            'filter' => CHtml::activeDropDownList($model, 'usuario_id', CHtml::listData($oUsuarios, 'id', 'nome'), array(
//                'empty' => '',
//            )),
//        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("despesa/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("despesa/update")',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("despesa/delete")',
                ),
            ),
        ),
    ),
));
?>
