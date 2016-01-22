<?php
/* @var $this CompraController */
/* @var $model Compra */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Compras'
    ),
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#compra-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Compras</h1>

<div class="admin-buttons">
    <?= CHtml::link(($exibeFormularioBusca ? 'Ocultar' : 'Exibir') . ' Filtros', '#', array('class' => 'search_button btn btn-success')) ?>

    <?php
    if (Yii::app()->user->checkAccess('compra/create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'success',
            'size' => 'medium',
            'label' => 'Cadastrar',
            'url' => Yii::app()->createUrl('compra/create'),
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
            'name' => 'Compra[data_hora_inicial_grid]',
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
            'name' => 'Compra[data_hora_final_grid]',
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
    'id' => 'compra-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'afterAjaxUpdate' => "function() {
                                  jQuery('#Compra_data_hora_inicial_grid').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                                  jQuery('#Compra_data_hora_final_grid').datepicker(jQuery.extend({showMonthAfterYear:false}, jQuery.datepicker.regional['pt'], {'showAnim':'fold','dateFormat':'yy-mm-dd','changeMonth':'true','showButtonPanel':'true','changeYear':'true','constrainInput':'false'}));
                              }",
    'rowCssClassExpression' => '$data->getColor($data->excluido)',
    'columns' => array(
        array(
            'name' => 'produto_id',
            'value' => '!empty($data->produto_id) ? $data->produto->titulo : ""',
        ),
        'nota_fiscal',
        array(
            'name' => 'preco',
            'value' => '!empty($data->preco) ? "R$ ". FormatHelper::valorMonetario($data->preco, 2) : ""'
        ),
        array(
            'name' => 'quantidade',
            'value' => '$data->quantidade',
            'htmlOptions' => array('width' => '100px'),
        ),
        array(
            'name' => 'data_hora',
            'filter' => $intervaloDataPedido,
            'value' => '!empty($data->data_hora) ? date("d/m/Y H:i:s", strtotime($data->data_hora)) : ""'
        ),
        array(
            'name' => 'excluido',
            'value' => '!empty($data->excluido) && $data->excluido == 1 ? "Sim" : "Não"'
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{cancelar}',
            'buttons' => array(
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("compra/view")',
                ),
                'cancelar' => array(
                    'label' => '<i class="fa fa-times"></i>',
                    'options' => array(
                        'ajax' => array(
                            'type' => 'GET',
                            'url' => "js:$(this).attr('href')",
                            'beforeSend' => 'function(){
                                    var confirma = confirm("Deseja cancelar esta compra ?");
                                    if (!confirma) {
                                        alert("Nenhuma ação realizada!");
                                        return false;
                                    }
                                }',
                            'success' => 'function(data) {
                                            var obj = $.parseJSON(data);
                                            if(obj.status == "success"){
                                                alert("Compra cancelada com sucesso!");
                                            } else {
                                                alert(obj.errors["quantidade"]);
                                            }
                                        }'
                        ),
                        'title' => 'Cancelar compra', 'style' => 'margin:0 5px 0 0;color:#313131;'
                    ),
                    'url' => 'Yii::app()->createUrl("compra/cancelar", array("id" => $data->id))',
                    'visible' => 'Yii::app()->user->checkAccess("compra/cancelar") && $data->checaCancelado()',
                ),
            ),
        ),
    ),
));
?>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/site.js"></script>