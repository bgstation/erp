<?php
/* @var $this ProdutoController */
/* @var $model Produto */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Produtos' => $this->createUrl('admin'),
        $model->titulo => '',
        'Atualizar',
    ),
));
?>

<h1>Atualizar produto: <?php echo $model->titulo; ?></h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'oModelos' => $oModelos,
    'oMarcas' => $oMarcas,
));
?>