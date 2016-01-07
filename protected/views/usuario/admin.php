<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Usuários'
    ),
));
?>

<h1>Usuários</h1>

<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'type' => 'primary',
    'size' => 'medium',
    'label' => 'Cadastrar',
    'url' => Yii::app()->createUrl('usuario/create'),
    'htmlOptions' => array(
        'class' => 'pull-left',
    ),
        )
);
?>
    <br>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'usuario-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'nome',
        'login',
        'acl_tipo_usuario_id',
        array(
            'name' => 'excluido',
            'value' => '$data->excluido? \'Sim\' : \'Não\''
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
