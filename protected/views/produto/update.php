<?php
/* @var $this ProdutoController */
/* @var $model Produto */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Produtos' => $this->createUrl('admin'),
        'Atualizar',
    ),
));
?>

<h1>Atualizar Produto: <?= $model->titulo ?></h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'oModelos' => $oModelos,
    'oMarcas' => $oMarcas,
    'oTiposProduto' => $oTiposProduto,
));
?>