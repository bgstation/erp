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
//if (Yii::app()->user->checkAccess('ordemServico/create')) {
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
//}
?>
<br>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'ordem-servico-grid',
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
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
