<?php
/* @var $this LogItemNaoCadastradoController */
/* @var $model LogItemNaoCadastrado */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Atualizar Item Não Cadastrado',
    ),
));
?>

<h1>Atualizar Item: <?= $model->titulo ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>