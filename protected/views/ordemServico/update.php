<?php
/* @var $this OrdemServicoController */
/* @var $model OrdemServico */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Ordens de Serviços' => Yii::app()->createUrl('ordemServico/admin'),
        'Atualizar',
    ),
));
?>

<h1>Atualizar Ordem de Serviço <?= $model->id ?></h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'oClientes' => $oClientes,
    'oOrdemServicoItem' => $oOrdemServicoItem,
    'valor_total' => $valor_total,
));
?>