<?php
/* @var $this TipoDespesaController */
/* @var $model TipoDespesa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Tipo de despesa'
    ),
));
?>

<h1>Tipo de despesa</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>