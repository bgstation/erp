<?php
/* @var $this ServicoController */
/* @var $model Servico */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Servicos' => Yii::app()->createUrl('servico/admin'),
        'Atualizar',
    ),
));
?>

<h3>Atualizar servico <?php echo $model->titulo; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>