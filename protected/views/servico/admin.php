<?php
/* @var $this ServicoController */
/* @var $model Servico */
$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Serviços'
    ),
));
?>

<h1>Serviços</h1>

<?php
if (Yii::app()->user->checkAccess('servico/create')) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'size' => 'medium',
        'label' => 'Cadastrar',
        'url' => Yii::app()->createUrl('servico/create'),
        'htmlOptions' => array(
            'class' => 'pull-left',
        ),
            )
    );
}
?>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'servico-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'titulo',
        array(
            'name' => 'preco',
            'value' => '!empty($data->preco) ? "R$ ". RPFormat::valorMonetario($data->preco) : ""',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("servico/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("servico/update")',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("servico/delete")',
                ),
            ),
        ),
    ),
));
?>
