<?php
/* @var $this LogRetiradaProdutoController */
/* @var $model LogRetiradaProduto */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Retirada de produtos' => Yii::app()->createUrl('logRetiradaProduto/admin'),
        $model->id
    ),
));
?>

<h1>Retirada de produto: <?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        array(
            'name' => 'produto_id',
            'value' => !empty($model->produto_id) ? $model->produto->titulo : '',
        ),
        'quantidade',
        array(
            'name' => 'usuario_id',
            'value' => !empty($model->usuario_id) ? $model->usuario->nome : '',
        ),
        'observacao',
        array(
            'name' => 'data_hora',
            'value' => !empty($model->data_hora) ? date("d/m/Y H:i:s", strtotime($model->data_hora)) : '',
        ),
    ),
));
?>
