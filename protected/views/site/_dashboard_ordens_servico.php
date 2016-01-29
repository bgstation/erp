<?php

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
        $this->renderPartial('/ordemServico/_search', array(
            'model' => $oOrdemServico,
        ));
        ?>
    </div>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'ordem-servico-grid',
    'dataProvider' => $oOrdemServico->search(),
    'filter' => $oOrdemServico,
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
            'header' => 'Valor',
            'value' => 'RPFormat::valorMonetario($data->getValorTotal())',
        ),
        array(
            'header' => 'Status',
            'value' => '$data->getTituloStatus()',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{finalizar}{view}{update}{delete}{cancelar}',
            'buttons' => array(
                'finalizar' => array(
                    'label' => '<i class="fa fa-check-circle"></i>',
                    'options' => array('title' => 'Finalizar OS', 'style' => 'margin:0 5px 0 0;color:#313131;'),
                    'url' => 'Yii::app()->createUrl("ordemServico/finalizar", array("id" => $data->id))',
                    'visible' => 'Yii::app()->user->checkAccess("ordemServico/finalizar") && $data->getStatus() == 1',
                ),
                'view' => array(
                    'url' => 'Yii::app()->createUrl("ordemServico/view", array("id" => $data->id))',
                    'visible' => 'Yii::app()->user->checkAccess("ordemServico/view")',
                ),
                'update' => array(
                    'url' => 'Yii::app()->createUrl("ordemServico/update", array("id" => $data->id))',
                    'visible' => 'Yii::app()->user->checkAccess("ordemServico/update") && $data->getStatus() == 1',
                ),
                'delete' => array(
                    'url' => 'Yii::app()->createUrl("ordemServico/delete", array("id" => $data->id))',
                    'visible' => 'Yii::app()->user->checkAccess("ordemServico/delete") && $data->getStatus() == 1',
                ),
                'cancelar' => array(
                    'label' => '<i class="fa fa-times"></i>',
                    'options' => array(
                        'ajax' => array(
                            'type' => 'GET',
                            'url' => "js:$(this).attr('href')",
                            'beforeSend' => 'function(){
                                    var confirma = confirm("Deseja cancelar esta ordem de serviço ?");
                                    if (!confirma) {
                                        alert("Nenhuma ação realizada!");
                                        return false;
                                    }
                                }',
                            'success' => 'function(data) {
                                            var obj = $.parseJSON(data);
                                            if(obj.status == "success"){
                                                alert("Ordem de serviço cancelada com sucesso!");
                                            } else {
                                                alert("Houve algum erro ao cancelar!");
                                            }
                                        }'
                        ),
                        'title' => 'Cancelar', 'style' => 'margin:0 5px 0 0;color:#313131;'
                    ),
                    'url' => 'Yii::app()->createUrl("ordemServico/cancelar", array("id" => $data->id))',
                    'visible' => 'Yii::app()->user->checkAccess("ordemServico/cancelar") && $data->getStatus() == 2',
                ),
            ),
        ),
    ),
));
?><script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/site.js"></script>
