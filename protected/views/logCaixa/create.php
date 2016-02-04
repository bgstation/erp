<?php
/* @var $this LogCaixaController */
/* @var $model LogCaixa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Caixa' => Yii::app()->createUrl('logCaixa/admin'),
        'Nova alteração',
    ),
));
?>

<h3>Caixa</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>