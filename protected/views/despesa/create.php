<?php
/* @var $this DespesaController */
/* @var $model Despesa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Despesas'
    ),
));
?>

<h3>Cadastrar nova despesa</h3>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'oTiposDespesa' => $oTiposDespesa,
));
?>