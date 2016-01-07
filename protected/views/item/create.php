<?php
/* @var $this ItemController */
/* @var $model Item */


$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Itens' => Yii::app()->createUrl('item/admin'),
        'Cadastrar',
    ),
));
?>


<h3>Cadastro de item</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>