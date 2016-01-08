<?php
/* @var $this TipoUsuarioController */
/* @var $model AclTipoUsuario */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Tipos de Usuários'
    ),
));
?>

<h1>Tipos de Usuários</h1>

<?php
if (Yii::app()->user->checkAccess('aclTipoUsuario/create')) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'size' => 'medium',
        'label' => 'Cadastrar',
        'url' => Yii::app()->createUrl('aclTipoUsuario/create'),
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
    'id' => 'acl-tipo-usuario-grid',
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
                    'visible' => 'Yii::app()->user->checkAccess("aclTipoUsuario/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("aclTipoUsuario/update")',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("aclTipoUsuario/delete")',
                ),
            ),
        ),
    ),
));
?>
