<?php
/* @var $this TipoProdutoController */
/* @var $model TipoProduto */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Tipos de Produtos' => Yii::app()->createUrl('tipoProduto/admin'),
        'Novo Tipo de Produto'
    ),
));
?>

<h1>Cadastrar tipo de produto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>