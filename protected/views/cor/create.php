<?php
/* @var $this CorController */
/* @var $model Cor */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cores' => Yii::app()->createUrl('cor/admin'),
        'Cadastrar',
    ),
));
?>

<h1>Cadastrar cor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>