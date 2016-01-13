<?php
/* @var $this CompraController */
/* @var $model Compra */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Compras' => Yii::app()->createUrl('compra/admin'),
        'Cadastrar',
    ),
));
?>

<h1>Cadastrar nova compra</h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'oProdutos' => $oProdutos,
));
?>