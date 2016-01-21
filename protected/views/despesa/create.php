<?php
/* @var $this DespesaController */
/* @var $model Despesa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Despesas' => Yii::app()->createUrl('despesa/admin'),
        'Nova Despesa'
    ),
));
?>

<h1>Cadastrar Despesa</h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'oTiposDespesa' => $oTiposDespesa,
));
?>