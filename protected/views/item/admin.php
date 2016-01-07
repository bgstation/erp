<?php
/* @var $this ItemController */
/* @var $model Item */
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Itens'
    ),
));
?>

<h3>Itens</h3>

<?php
$this->widget('bootstrap.widgets.TbButton', array(
    'type' => 'primary',
    'size' => 'medium',
    'label' => 'Cadastrar',
    'url' => Yii::app()->createUrl('item/create'),
    'htmlOptions' => array(
        'class' => 'pull-left',
    ),
        )
);
?>
    <br>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'item-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'titulo',
        array(
            'name' => 'preco',
            'value' => '!empty($data->preco) ? number_format($data->preco, 2, ",", ".") : ""',
        ),
        'observacao',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
