<?php
/* @var $this OrdemServicoController */
/* @var $model OrdemServico */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Ordens de Serviços'
    ),
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ordem-servico-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Ordens de Serviços</h1>

<div class="admin-buttons">
    <?= CHtml::link(($exibeFormularioBusca ? 'Ocultar' : 'Exibir') . ' Filtros', '#', array('class' => 'search_button btn btn-success')) ?>

    <?php
    if (Yii::app()->user->checkAccess('ordemServico/create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'success',
            'size' => 'medium',
            'label' => 'Cadastrar',
            'url' => Yii::app()->createUrl('ordemServico/create'),
                )
        );
    }
    ?>
    <div class="search_form" style='display:<?= $exibeFormularioBusca ? '' : 'none' ?>;'>
        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>
    </div>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'ordem-servico-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'id',
            'value' => '$data->id',
            'htmlOptions' => array('width' => '100px'),
        ),
        array(
            'name' => 'cliente_id',
            'value' => '!empty($data->cliente_id) ? $data->cliente->nome : "" ',
        ),
        array(
            'name' => 'cliente_carro_id',
            'value' => '!empty($data->cliente_carro_id) ? $data->clienteCarro->placa : "" ',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{finalizar}{view}{update}{delete}',
            'buttons' => array(
                'finalizar' => array(
                    'label' => '<i class="fa fa-check-circle"></i>',
                    'options' => array('title' => 'Finalizar OS', 'style' => 'margin:0 5px 0 0;color:#313131;'),
                    'url' => 'Yii::app()->createUrl("ordemServico/finalizar", array("id" => $data->id))',
                    'visible' => 'Yii::app()->user->checkAccess("ordemServico/finalizar") && $data->getStatus() == 1',
                ),
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("ordemServico/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("ordemServico/update") && $data->getStatus() == 1',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("ordemServico/delete") && $data->getStatus() == 1',
                ),
            ),
        ),
    ),
));
?><script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/site.js"></script>
