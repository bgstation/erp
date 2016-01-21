<?php
/* @var $this FinanceiroController */
/* @var $model Financeiro */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Relatório' => '',
        'Financeiro'
    ),
));
?>

<h1>Financeiro</h1>

<p>Ordens de Serviço: R$ <?= number_format($aTotais['ordem_servico'], 2, ",", ".") ?></p>
<p>Compras: R$ <?= number_format($aTotais['compra'], 2, ",", ".") ?></p>
<p>Despesas: R$ <?= number_format($aTotais['despesa'], 2, ",", ".") ?></p>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'financeiro-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'rowCssClassExpression' => '$data->getColor($data->tipo_item)',
    'columns' => array(
        array(
            'name' => 'tipo_item',
            'value' => '$data->aTiposItens[$data->tipo_item]',
            'filter' => CHtml::activeDropDownList($model, 'tipo_item', $model->aTiposItens, array(
                'empty' => '',
            )),
        ),
        array(
            'name' => 'tipo_item_id',
            'type' => 'raw',
            'value' => '$data->getLink($data->tipo_item, $data->tipo_item_id)',
        ),
        'descricao',
        array(
            'name' => 'valor',
            'value' => '!empty($data->valor) ? "R$ ". number_format($data->valor, 2, ",", ".") : ""'
        ),
        array(
            'name' => 'data_hora',
            'value' => '!empty($data->data_hora) ? date("d/m/Y H:i:s", strtotime($data->data_hora)) : ""'
        ),
        array(
            'name' => 'status',
            'value' => '$data->status == 1 ? "Cancelada" : "Ativa"'
        ),
    ),
));
?>
