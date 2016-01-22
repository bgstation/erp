<?php
/* @var $this DespesaController */
/* @var $model Despesa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Despesas'
    ),
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#despesa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Despesas</h1>

<div class="admin-buttons">
    <?= CHtml::link(($exibeFormularioBusca ? 'Ocultar' : 'Exibir') . ' Filtros', '#', array('class' => 'search_button btn btn-success')) ?>

    <?php
    if (Yii::app()->user->checkAccess('despesa/create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'success',
            'size' => 'medium',
            'label' => 'Cadastrar',
            'url' => Yii::app()->createUrl('despesa/create'),
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
$intervaloDataPedido = $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'name' => 'Despesa[data_hora_inicial_grid]',
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
            'name' => 'Despesa[data_hora_final_grid]',
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

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'despesa-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'afterAjaxUpdate' => "function() {
                              jQuery('#Despesa_data_hora_inicial_grid').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                              jQuery('#Despesa_data_hora_final_grid').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                          }",
    'columns' => array(
        array(
            'name' => 'tipo_despesa_id',
            'value' => '!empty($data->tipo_despesa_id) ? $data->tipoDespesa->titulo : ""',
        ),
        array(
            'name' => 'preco',
            'value' => '!empty($data->preco) ? "R$ ". FormatHelper::valorMonetario($data->preco) : NULL'
        ),
        'quantidade',
        array(
            'name' => 'data_hora',
            'filter' => $intervaloDataPedido,
            'value' => '!empty($data->data_hora) ? FormatHelper::dataHora($data->data_hora) : NULL'
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("despesa/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("despesa/update")',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("despesa/delete")',
                ),
            ),
        ),
    ),
));
?>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/site.js"></script>