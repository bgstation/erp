<?php
/* @var $this DespesaController */
/* @var $model Despesa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Despesas' => $this->createUrl('admin'),
        $model->id => $this->createUrl('view', array('id' => $model->id)),
        'Atualizar',
    ),
));
?>

<h1>Despesa: <?php echo $model->id; ?></h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'oTiposDespesa' => $oTiposDespesa,
));
?>