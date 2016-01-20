<?php
/* @var $this OrdemServicoController */
/* @var $model OrdemServico */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Ordens de Serviços'
    ),
));
?>

<h1>Ordens de Serviços</h1>

<?php
if (Yii::app()->user->checkAccess('ordemServico/create')) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'size' => 'medium',
        'label' => 'Cadastrar',
        'url' => Yii::app()->createUrl('ordemServico/create'),
        'htmlOptions' => array(
            'class' => 'pull-left',
        ),
            )
    );
}
?>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'modelo-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id',
            'value' => '$data->id',
            'htmlOptions'=>array('width'=>'100px'),
        ),
        array(
            'name' => 'cliente_id',
            'value' => '!empty($data->cliente_id) ? $data->cliente->nome : "" ',
            'filter' => CHtml::activeDropDownList($model, 'cliente_id', CHtml::listData($oClientes, 'id', 'nome'), array(
                'empty' => '',
            )),
        ),
        array(
            'name' => 'cliente_carro_id',
            'value' => '!empty($data->cliente_carro_id) ? $data->clienteCarro->placa : "" ',
            'filter' => CHtml::activeDropDownList($model, 'cliente_carro_id', CHtml::listData($oClientesCarros, 'id', 'placa'), array(
                'empty' => '',
            )),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{finalizar}{view}{update}{delete}',
            'buttons' => array(
                'finalizar' => array(
                    'url' => 'Yii::app()->createUrl("ordemServico/finalizar", array("id" => $data->id))',
                    'visible' => 'Yii::app()->user->checkAccess("ordemServico/finalizar")',
                ),
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("ordemServico/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("ordemServico/update")',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("ordemServico/delete")',
                ),
            ),
        ),
    ),
));
?>
