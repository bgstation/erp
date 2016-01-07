<?php
/* @var $this MarcaController */
/* @var $model Marca */
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Marcas'
    ),
));
?>

<h3>Cadastrar marca</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>