<?php
/* @var $this LogCaixaController */
/* @var $model LogCaixa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Caixa' => Yii::app()->createUrl('logCaixa/admin'),
        $model->id,
    ),
));
?>

<h1>Log Caixa #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        array(
            'name' => 'operacao_id',
            'value' => $model->aOperacoes[$model->operacao_id],
        ),
        'descricao',
        array(
            'name' => 'valor',
            'value' => !empty($model->valor) ? 'R$ '. FormatHelper::valorMonetario($model->valor) : '',
        ),
        array(
            'name' => 'data_hora',
            'value' => FormatHelper::dataHora($model->data_hora),
        ),
        array(
            'name' => 'usuario_id',
            'value' => $model->usuario->nome,
        ),
    ),
));
?>
