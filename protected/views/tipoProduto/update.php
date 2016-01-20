<?php
/* @var $this TipoProdutoController */
/* @var $model TipoProduto */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Tipos de Produtos' => $this->createUrl('admin'),
        'Atualizar',
    ),
));
?>

<h1>Atualizar Tipo de Produto: <?= $model->titulo ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>