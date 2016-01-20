<?php
/* @var $this DespesaController */
/* @var $model Despesa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Despesas' => $this->createUrl('admin'),
        'Atualizar',
    ),
));
?>

<h1>Atualizar Despesa: <?= $model->tipoDespesa->titulo ?></h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'oTiposDespesa' => $oTiposDespesa,
));
?>