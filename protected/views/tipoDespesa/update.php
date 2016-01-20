<?php
/* @var $this TipoDespesaController */
/* @var $model TipoDespesa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Tipos de Despesas' => $this->createUrl('admin'),
        'Atualizar',
    ),
));
?>

<h1>Atualizar Tipo de Despesa: <?= $model->titulo ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>