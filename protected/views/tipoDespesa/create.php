<?php
/* @var $this TipoDespesaController */
/* @var $model TipoDespesa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Tipos de Despesas' => Yii::app()->createUrl('tipoDespesa/admin'),
        'Novo Tipo de Despesa'
    ),
));
?>

<h1>Cadastrar Tipo de Despesa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>