<?php
/* @var $this FinanceiroController */
/* @var $model Financeiro */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Relatório' => '',
        'Financeiro'
    ),
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#financeiro-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Financeiro</h1>

<p>Ordens de Serviço: R$ <?= FormatHelper::valorMonetario($aTotais['ordem_servico']) ?></p>
<p>Compras: R$ <?= FormatHelper::valorMonetario($aTotais['compra']) ?></p>
<p>Despesas: R$ <?= FormatHelper::valorMonetario($aTotais['despesa']) ?></p>

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
$intervaloDataPedido = $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'Financeiro[data_hora_inicial_grid]',
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
            'name' => 'Financeiro[data_hora_final_grid]',
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
    'id' => 'financeiro-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'afterAjaxUpdate' => "function() {
                              jQuery('#Financeiro_data_hora_inicial_grid').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                              jQuery('#Financeiro_data_hora_final_grid').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                          }",
    'rowCssClassExpression' => '$data->getColor($data->tipo_item)',
    'columns' => array(
        array(
            'name' => 'tipo_item_id',
            'type' => 'raw',
            'value' => '$data->getLink($data->tipo_item, $data->tipo_item_id)',
        ),
        array(
            'name' => 'tipo_item',
            'value' => '$data->aTiposItens[$data->tipo_item]',
            'filter' => CHtml::activeDropDownList($model, 'tipo_item', $model->aTiposItens, array(
                'empty' => '',
            )),
        ),
        'descricao',
        array(
            'name' => 'valor',
            'value' => '!empty($data->valor) ? "R$ ". FormatHelper::valorMonetario($data->valor) : ""'
        ),
        array(
            'name' => 'data_hora',
            'filter' => $intervaloDataPedido,
            'value' => '!empty($data->data_hora) ? date("d/m/Y H:i:s", strtotime($data->data_hora)) : ""'
        ),
        array(
            'name' => 'status',
            'value' => '$data->status == 1 ? "Cancelada" : "Ativa"'
        ),
    ),
        ));

$this->renderExportGridButton($gridView, 'Exportar Relatório', array('class' => 'btn btn-info pull-left'));
?>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/site.js"></script>