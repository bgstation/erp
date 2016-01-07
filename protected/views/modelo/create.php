<?php
/* @var $this ModeloController */
/* @var $model Modelo */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Modelos'
    ),
));
?>

<h3>Cadastrar modelo</h3>

<?php
$this->renderPartial('_form', array(
    'model' => $model,
    'oMarcas' => $oMarcas,
));
?>