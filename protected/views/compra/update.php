<?php
/* @var $this CompraController */
/* @var $model Compra */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Compras' => Yii::app()->createUrl('compra/admin'),
        'Atualizar',
    ),
));
?>

<h1>Atualizar Compra: <?= $model->id ?></h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'oProdutos' => $oProdutos,
));
?>