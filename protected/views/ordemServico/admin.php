<?php
/* @var $this OrdemServicoController */
/* @var $model OrdemServico */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Ordens de serviço'
    ),
));
?>

<h3>Ordens de serviços</h3>

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
<br>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'modelo-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'cliente_id',
        'cliente_carro_id',
        'forma_pagamento_id',
        'observacao',
        'excluido',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{finalizar}{view}{update}{delete}',
            'buttons' => array(
                'finalizar' => array(
                    'url' => 'Yii::app()->createUrl("ordemServico/finalizar", array("id" => $data->id))',
//                    'visible' => 'Yii::app()->user->checkAccess("ordemServico/finalizar")',
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
