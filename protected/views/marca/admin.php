<?php
/* @var $this MarcaController */
/* @var $model Marca */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Marcas'
    ),
));
?>

<h3>Marcas</h3>

<?php
if (Yii::app()->user->checkAccess('marca/create')) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'size' => 'medium',
        'label' => 'Cadastrar',
        'url' => Yii::app()->createUrl('marca/create'),
        'htmlOptions' => array(
            'class' => 'pull-left',
        ),
            )
    );
}
?>
<br>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'marca-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'titulo',
        'observacao',
        'excluido',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("marca/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("marca/update")',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("marca/delete")',
                ),
            ),
        ),
    ),
));
?>
