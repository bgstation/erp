<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Tipo de Usuário' => Yii::app()->createUrl('tipoUsuario/admin'),
        'Cadastrar',
    ),
));
?>

<h1>Cadastrar Tipo de Usuário</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>