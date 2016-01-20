<?php
/* @var $this TipoDespesaController */
/* @var $model TipoDespesa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Tipos de Despesas'
    ),
));
?>

<h1>Tipos de Despesas</h1>

<?php
if (Yii::app()->user->checkAccess('tipoDespesa/create')) {
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
}
?>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'tipo-despesa-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'titulo',
        array(
            'name' => 'excluido',
            'value' => '$data->excluido? \'Sim\' : \'Não\''
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("tipoDespesa/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("tipoDespesa/update")',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("tipoDespesa/delete")',
                ),
            ),
        ),
    ),
));
?>
