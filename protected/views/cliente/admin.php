<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Clientes'
    ),
));
?>

<h1>Clientes</h1>

<?php
if (Yii::app()->user->checkAccess('cliente/create')) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'size' => 'medium',
        'label' => 'Cadastrar',
        'url' => Yii::app()->createUrl('cliente/create'),
        'htmlOptions' => array(
            'class' => 'pull-left',
        ),
            )
    );
}
?>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'cliente-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'nome',
        'email',
        'cpf',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("cliente/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("cliente/update")',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("cliente/delete")',
                ),
            ),
        ),
    ),
));
?>
