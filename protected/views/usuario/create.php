<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Usuários' => Yii::app()->createUrl('usuario/admin'),
        'Cadastrar',
    ),
));
?>

<h1>Cadastrar Usuário</h1>

<?php $this->renderPartial('_form', array('model' => $model, 'oAclTiposUsuarios' => $oAclTiposUsuarios)); ?>