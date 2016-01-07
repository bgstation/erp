<?php
/* @var $this ItemController */
/* @var $model Item */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Itens' => Yii::app()->createUrl('item/admin'),
        'Atualizar',
    ),
));
?>

<h3>Atualizar item <?php echo $model->titulo; ?></h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>