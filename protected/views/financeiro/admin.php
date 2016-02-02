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
<div class="span6" >
    <div class="financeiro-resumo">
        <p class='financeiro-resumo-os'>Ordens de Serviço: R$ <?= FormatHelper::valorMonetario($oTotalOrdemServico) ?></p>
        <li><p class="dinheiro">Dinheiro: R$ <?= FormatHelper::valorMonetario($oTotalOrdemServicoDinheiro) ?></p></li>
        <li>
            <p class="cartao">Cartão: R$ <?= FormatHelper::valorMonetario($oTotalOrdemServicoCartaoDebito + $oTotalOrdemServicoCartaoCredito) ?></p>
            <ul>
                <li class="cartao_debito">Débito: R$ <?= FormatHelper::valorMonetario($oTotalOrdemServicoCartaoDebito) ?></li>
                <li class="cartao_credito">Crédito: R$ <?= FormatHelper::valorMonetario($oTotalOrdemServicoCartaoCredito) ?></li>
            </ul>
        </li>
        <br>
        <p class='financeiro-resumo-compras'>Compras: R$ <?= FormatHelper::valorMonetario($oTotalCompras) ?></p>
        <p class='financeiro-resumo-despesas'>Despesas: R$ <?= FormatHelper::valorMonetario($oTotalDespesas) ?></p>
        <strong><p class='financeiro-total'>Total: R$ <?= FormatHelper::valorMonetario($oTotalOrdemServico - $oTotalDespesas) ?></p></strong>
    </div>
</div>
<div class="span6" >
    <h3>Caixa</h3>
    <li>Inicial: R$ <?= FormatHelper::valorMonetario($aValoresCaixa['inicio']) ?></li>
    <li>Atual: R$ <?= FormatHelper::valorMonetario($aValoresCaixa['inicio'] - $aValoresCaixa['retiradas'] + $oTotalOrdemServicoDinheiroParcial) ?></li>
</div>

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
    'afterAjaxUpdate' => "function(id, data) {
                              jQuery('#Financeiro_data_hora_inicial_grid').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                              jQuery('#Financeiro_data_hora_final_grid').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));

                              $('.financeiro-resumo-os').text($(data).find('.financeiro-resumo-os').html());
                              $('.financeiro-resumo-compras').text($(data).find('.financeiro-resumo-compras').html());
                              $('.financeiro-resumo-despesas').text($(data).find('.financeiro-resumo-despesas').html());
                              $('.dinheiro').text($(data).find('.dinheiro').html());
                              $('.cartao').text($(data).find('.cartao').html());
                              $('.cartao_debito').text($(data).find('.cartao_debito').html());
                              $('.cartao_credito').text($(data).find('.cartao_credito').html());
                              $('.financeiro-total').text($(data).find('.financeiro-total').html());
                          }",
    'rowCssClassExpression' => '$data->getColor($data->tipo_item)',
    'columns' => array(
        array(
            'name' => 'tipo_item',
            'value' => '$data->aTiposItens[$data->tipo_item]',
            'filter' => CHtml::activeDropDownList($model, 'tipo_item', $model->aTiposItens, array(
                'empty' => '',
            )),
        ),
        array(
            'name' => 'tipo_item_id',
            'type' => 'raw',
            'value' => '$data->getLink($data->tipo_item, $data->tipo_item_id)',
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