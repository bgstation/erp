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
$intervaloDataHora = $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'OrdemServicoItem[data_hora_inicial_grid]',
            'language' => 'pt',
            'value' => $model->data_hora_inicial_grid,
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'constrainInput' => 'false',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;width:100%;',
            ),
                ), true) . '<br> Até <br> ' . $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'OrdemServicoItem[data_hora_final_grid]',
            'language' => 'pt',
            'value' => $model->data_hora_final_grid,
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'constrainInput' => 'false',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;width:100%',
            ),
                ), true);

$gridView = $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'ordem-servico-item-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'afterAjaxUpdate' => "function(id, data) {
                              jQuery('#OrdemServicoItem_data_hora_inicial_grid').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                              jQuery('#OrdemServicoItem_data_hora_final_grid').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                          }",
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
            'filter' => $intervaloDataHora,
            'value' => 'FormatHelper::dataHora($data->datahora_insercao)'
        ),
    ),
));

$this->renderExportGridButton($gridView, 'Exportar Relatório', array('class' => 'btn btn-info pull-left'));
?>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/site.js"></script>