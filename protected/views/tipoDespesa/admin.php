<?php
/* @var $this TipoDespesaController */
/* @var $model TipoDespesa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Tipos de despesa'
    ),
));
?>

<h3>Tipos de despesas</h3>

<?php
//if (Yii::app()->user->checkAccess('tipoDespesa/create')) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'size' => 'medium',
        'label' => 'Cadastrar',
        'url' => Yii::app()->createUrl('tipoDespesa/create'),
        'htmlOptions' => array(
            'class' => 'pull-left',
        ),
            )
    );
//}
?>
<br>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'tipo-despesa-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'titulo',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
