<?php
/* @var $this AclTipoUsuarioRotaController */
/* @var $model AclTipoUsuarioRota */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Rotas por Tipo de Usuário',
    ),
));
?>

<h1>Rotas por Tipo de Usuário</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'acl-tipo-usuario-rota-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'acl_rota_id',
        'acl_tipo_usuario_id',
        array(
            'name' => 'excluido',
            'value' => '$data->excluido? \'Sim\' : \'Não\''
        ),
        'data_insercao',
        'data_ultima_atualizacao',
    ),
));
?>
