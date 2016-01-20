<?php
/* @var $this ProdutoController */
/* @var $model Produto */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Produtos' => Yii::app()->createUrl('produto/admin'),
        'Novo Produto'
    ),
));
?>

<h1>Cadastrar Produto</h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'oModelos' => $oModelos,
    'oMarcas' => $oMarcas,
    'oTiposProduto' => $oTiposProduto,
));
?>