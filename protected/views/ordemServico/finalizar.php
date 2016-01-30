<?php
/* @var $this OrdemServicoController */
/* @var $model OrdemServico */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Ordens de Serviço' => Yii::app()->createUrl('ordemServico/admin'),
        'Finalizar',
    ),
));
?>

<h3>Finalizar ordem de serviço: <?= $model->id ?></h3>

<?php
$this->renderPartial('_finalizar', array(
    'model' => $model,
    'oClientes' => $oClientes,
    'oOrdemServicoItem' => $oOrdemServicoItem,
    'valor_total' => $valor_total,
    'oLogItemNaoCadastrador' => $oLogItemNaoCadastrador,
    'oLogOrdemServico' => $oLogOrdemServico,
    'oOrdemServicoTipoPagamento' => $oOrdemServicoTipoPagamento,
    'atualizar' => $atualizar,
));
?>