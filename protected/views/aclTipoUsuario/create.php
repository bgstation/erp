<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Tipos de Usuários' => Yii::app()->createUrl('aclTipoUsuario/admin'),
        'Novo Tipo de Usuário',
    ),
));
?>

<h1>Cadastrar Tipo de Usuário</h1>

<?php $this->renderPartial('_form', array('model' => $model, 'aAclRotas' => $aAclRotas, 'aAclTipoUsuarioRotas' => array())); ?>