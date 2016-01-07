<?php
/* @var $this ModeloController */
/* @var $model Modelo */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Modelos' => Yii::app()->createUrl('modelo/admin'),
        $model->titulo => '',
        'Atualizar',
    ),
));
?>

<h1>Atualizar modelo: <?php echo $model->titulo; ?></h1>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'oMarcas' => $oMarcas,
));
?>