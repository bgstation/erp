<?php
/* @var $this MarcaController */
/* @var $model Marca */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Marcas' => Yii::app()->createUrl('marca/admin'),
        $model->titulo => '',
        'Atualizar',
    ),
));
?>

<h1>Update Marca <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>