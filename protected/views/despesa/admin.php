<?php
/* @var $this DespesaController */
/* @var $model Despesa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Despesas'
    ),
));
?>

<h3>Despesas</h3>

<?php
//if (Yii::app()->user->checkAccess('despesa/create')) {
$this->widget('bootstrap.widgets.TbButton', array(
    'type' => 'success',
    'size' => 'medium',
    'label' => 'Cadastrar',
    'url' => Yii::app()->createUrl('despesa/create'),
    'htmlOptions' => array(
        'class' => 'pull-left',
    ),
        )
);
//}
?>
<br>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'despesa-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'tipo_despesa_id',
        'preco',
        'observacao',
        'quantidade',
        'data_hora',
        /*
          'usuario_id',
          'excluido',
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
