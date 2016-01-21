<?php
/* @var $this MarcaController */
/* @var $model Marca */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Marcas' => Yii::app()->createUrl('marca/admin'),
        'Atualizar',
    ),
));
?>

<h1>Atualizar Marca: <?= $model->id ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>