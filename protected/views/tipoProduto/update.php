<?php
/* @var $this TipoProdutoController */
/* @var $model TipoProduto */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Tipo de produto' => $this->createUrl('admin'),
        $model->titulo => '',
        'Atualizar',
    ),
));
?>

<h1>Tipo de produto: <?php echo $model->titulo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>