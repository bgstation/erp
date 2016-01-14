<?php
/* @var $this OrdemServicoController */
/* @var $model OrdemServico */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Ordens de serviço' => Yii::app()->createUrl('ordemServico/admin'),
        'Cadastrar',
    ),
));
?>

<h3>Cadastrar ordem de serviço</h3>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'oClientes' => $oClientes,
    'oOrdemServicoItem' => $oOrdemServicoItem,
    'valor_total' => $valor_total,
    'oLogItemNaoCadastrador' => $oLogItemNaoCadastrador,
));
?>