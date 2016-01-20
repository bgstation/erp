<?php
/* @var $this ClienteCarroController */
/* @var $model ClienteCarro */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Clientes' => Yii::app()->createUrl('cliente/admin'),
        $oCliente->nome => Yii::app()->createUrl('cliente/view', array('id' => $oCliente->id)),
        'Cadastrar Carro'
    ),
));
?>

<h1>Cadastrar Carro</h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'oMarcas' => $oMarcas,
    'oCliente' => $oCliente,
    'oCores' => $oCores,
));
?>