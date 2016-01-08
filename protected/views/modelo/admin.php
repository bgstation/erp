<?php
/* @var $this ModeloController */
/* @var $model Modelo */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Modelos'
    ),
));
?>

<h3>Modelos</h3>


<?php
if (Yii::app()->user->checkAccess('modelo/create')) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'size' => 'medium',
        'label' => 'Cadastrar',
        'url' => Yii::app()->createUrl('modelo/create'),
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
    'id' => 'modelo-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'titulo',
        'marca_id',
        'observacao',
        'excluido',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("modelo/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("modelo/update")',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("modelo/delete")',
                ),
            ),
        ),
    ),
));
?>
