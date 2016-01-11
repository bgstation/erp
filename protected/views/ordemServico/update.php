<?php
/* @var $this OrdemServicoController */
/* @var $model OrdemServico */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Ordens de serviço' => Yii::app()->createUrl('ordemServico/admin'),
        $model->id => Yii::app()->createUrl('ordemServico/view', array('id' => $model->id)),
        'Atualizar',
    ),
));
?>

<h3>Atualizar ordem de serviço <?php echo $model->id; ?></h3>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'oClientes' => $oClientes,
    'oOrdemServicoItem' => $oOrdemServicoItem,
));
?>