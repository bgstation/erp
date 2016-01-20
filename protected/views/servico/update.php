<?php
/* @var $this ServicoController */
/* @var $model Servico */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Serviços' => Yii::app()->createUrl('servico/admin'),
        'Atualizar',
    ),
));
?>

<h1>Atualizar Serviço: <?= $model->titulo ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>