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

<?= CHtml::link('Cadastrar', Yii::app()->createUrl('aclTipoUsuario/create'), array('class' => 'search-button')) ?>

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
        ),
    ),
));
?>
