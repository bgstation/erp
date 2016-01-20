<?php
/* @var $this CorController */
/* @var $model Cor */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Cores' => Yii::app()->createUrl('cor/admin'),
        'Nova Cor',
    ),
));
?>

<h1>Cadastrar Cor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>