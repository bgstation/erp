<?php
/* @var $this ServicoController */
/* @var $model Servico */


$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Servicos' => Yii::app()->createUrl('servico/admin'),
        'Novo Serviço',
    ),
));
?>


<h1>Cadastrar Serviço</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>