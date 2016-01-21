<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Clientes' => Yii::app()->createUrl('cliente/admin'),
        'Novo Cliente',
    ),
));
?>

<h1>Cadastrar Cliente</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>