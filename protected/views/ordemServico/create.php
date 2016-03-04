<?php
/* @var $this OrdemServicoController */
/* @var $model OrdemServico */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Ordens de Serviços' => Yii::app()->createUrl('ordemServico/admin'),
        'Nova Ordem de Serviço',
    ),
));
?>

<h1>Cadastrar Ordem de Serviço</h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'oClientes' => $oClientes,
    'oOrdemServicoItem' => $oOrdemServicoItem,
    'valor_total' => $valor_total,
    'oLogItemNaoCadastrado' => $oLogItemNaoCadastrado,
    'oServicos' => $oServicos,
    'oProdutos' => $oProdutos,
));
?>