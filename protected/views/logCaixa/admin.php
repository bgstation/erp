<?php
/* @var $this LogCaixaController */
/* @var $model LogCaixa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Caixa'
    ),
));
?>

<h3>Caixa</h3>

<div class="admin-buttons">
    <?php
    if (Yii::app()->user->checkAccess('logCaixa/create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'success',
            'size' => 'medium',
            'label' => 'Alterar',
            'url' => Yii::app()->createUrl('logCaixa/create'),
                )
        );
    }
    ?>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'log-caixa-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'operacao_id',
            'value' => '$data->aOperacoes[$data->operacao_id]',
        ),
        array(
            'name' => 'valor',
            'value' => '!empty($data->valor) ? "R$ ". FormatHelper::valorMonetario($data->valor) : ""'
        ),
        'data_hora',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("logCaixa/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("logCaixa/update")',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("logCaixa/delete")',
                ),
            ),
        ),
    ),
));
?>
