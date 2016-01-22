<?php
/* @var $this LogRetiradaProdutoController */
/* @var $model LogRetiradaProduto */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Relatório' => '',
        'Retirada de Produtos'
    ),
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#log-retirada-produto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Retirada de Produtos</h1>

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
            'name' => 'LogRetiradaProduto[data_hora_inicial_grid]',
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
            'name' => 'LogRetiradaProduto[data_hora_final_grid]',
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
    'id' => 'log-retirada-produto-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'afterAjaxUpdate' => "function() {
                              jQuery('#LogRetiradaProduto_data_hora_inicial_grid').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                              jQuery('#LogRetiradaProduto_data_hora_final_grid').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                          }",
    'columns' => array(
        'id',
        array(
            'name' => 'produto_id',
            'value' => '!empty($data->produto_id) ? $data->produto->titulo : ""',
        ),
        'quantidade',
        array(
            'name' => 'usuario_id',
            'value' => '!empty($data->usuario_id) ? $data->usuario->nome : ""',
        ),
        array(
            'name' => 'data_hora',
            'filter' => $intervaloDataPedido,
            'value' => '!empty($data->data_hora) ? FormatHelper::dataHora($data->data_hora) : ""'
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}',
            'buttons' => array(
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("logRetiradaProduto/view")',
                ),
            ),
        ),
    ),
));
$this->renderExportGridButton($gridView, 'Exportar Relatório', array('class' => 'btn btn-info pull-left'));
?>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/site.js"></script>