<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Usuários',
    ),
));
?>

<h1>Usuários</h1>

<?php
if (Yii::app()->user->checkAccess('usuario/create')) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'size' => 'medium',
        'label' => 'Cadastrar',
        'url' => Yii::app()->createUrl('usuario/create'),
        'htmlOptions' => array(
            'class' => 'pull-left',
        ),
            )
    );
}
?>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'usuario-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'nome',
        'login',
        array(
            'name' => 'acl_tipo_usuario_id',
            'value' => '$data->tipoUsuario->titulo'
        ),
        array(
            'name' => 'excluido',
            'value' => '$data->excluido? \'Sim\' : \'Não\''
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("usuario/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("usuario/update")',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("usuario/delete")',
                ),
            ),
        ),
    ),
));
?>
