<?php
/* @var $this OrdemServicoItemController */
/* @var $model OrdemServicoItem */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Relatório' => '',
        'Itens Ordens de Serviço'
    ),
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ordem-servico-item-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Itens Ordens de Serviço</h1>

<div class="admin-buttons">
    <?= CHtml::link(($exibeFormularioBusca ? 'Ocultar' : 'Exibir') . ' Filtros', '#', array('class' => 'search_button btn btn-success')) ?>

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
    'id' => 'ordem-servico-item-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'ordem_servico_id',
        array(
            'name' => 'tipo_item_id',
            'value' => '$data->aTipoItem[$data->tipo_item_id]',
        ),
        array(
            'name' => 'item_id',
            'value' => '$data->getTituloItem()',
        ),
        'preco',
        array(
            'name' => 'datahora_insercao',
            'value' => 'FormatHelper::dataHora($data->datahora_insercao)'
        ),
    ),
));
?>

<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/site.js"></script>