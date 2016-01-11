<?php
/* @var $this OrdemServicoController */
/* @var $model OrdemServico */
/* @var $form CActiveForm */
?>

<style>

    .testere{
        float: right
    }

</style>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ordem-servico-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Os campos com <span class="required">*</span> são obrigatórios.</p>

    <ul id="myTabs" class="nav nav-tabs" role="tablist"> 
        <li role="presentation" class="active">
            <a href="#cliente" id="cliente-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Cliente</a>
        </li> 
        <li role="presentation" class="">
            <a href="#servicos" role="tab" id="servicos-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Serviços</a>
        </li> 
        <li role="presentation" class="">
            <a href="#pagamento" role="tab" id="pagamento-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Forma de pagamento</a>
        </li> 
    </ul>
    <div id="myTabContent" class="tab-content" style="min-height: 500px">
        <div role="tabpanel" class="tab-pane fade active in" id="cliente" aria-labelledby="cliente-tab">
            <div class="row">
                <?php echo $form->labelEx($model, 'cliente_id'); ?>
                <?php
                $this->widget('ext.select2.ESelect2', array(
                    'model' => $model,
                    'attribute' => 'cliente_id',
                    'data' => CHtml::listData($oClientes, 'id', 'nome'),
                    'options' => array(
                        'placeholder' => 'Cliente',
                        'allowClear' => false,
                    ),
                    'htmlOptions' => array(
                        'id' => 'select2_cliente_id',
                    ),
                ));
                ?>
                <?php echo $form->error($model, 'cliente_id'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'cliente_carro_id'); ?>
                <?php echo $form->hiddenField($model, 'cliente_carro_id'); ?>
                <?php echo $form->error($model, 'cliente_carro_id'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'observacao'); ?>
                <?php echo $form->textArea($model, 'observacao', array('rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($model, 'observacao'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'excluido'); ?>
                <?php echo $form->checkBox($model, 'excluido'); ?>
                <?php echo $form->error($model, 'excluido'); ?>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="servicos" aria-labelledby="servicos-tab">
            <div class="row">
                <?php echo $form->labelEx($oOrdemServicoItem, 'tipo_item_id'); ?>
                <?php
                $this->widget('ext.select2.ESelect2', array(
                    'model' => $oOrdemServicoItem,
                    'attribute' => 'tipo_item_id',
                    'data' => $oOrdemServicoItem->aTipoItem,
                    'options' => array(
                        'placeholder' => 'Tipo do item',
                        'allowClear' => false,
                    ),
                    'htmlOptions' => array(
                        'id' => 'select2_tipo_item_id',
                    ),
                ));
                ?>
                <?php echo $form->error($oOrdemServicoItem, 'tipo_item_id'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($oOrdemServicoItem, 'item_id'); ?>
                <?php echo $form->hiddenField($oOrdemServicoItem, 'item_id'); ?>
                <?php echo $form->error($oOrdemServicoItem, 'item_id'); ?>
            </div>
            <div class="row buttons" id="add_item" style="display: none">
                <?php
                $this->widget('bootstrap.widgets.TbButton', array(
                    'type' => 'button',
                    'size' => 'medium',
                    'buttonType' => 'button',
                    'label' => 'Adicionar',
                    'htmlOptions' => array(
                        'id' => 'btn_add_item'
                    ),
                        )
                );
                ?>
            </div>

            <input type="hidden" name="OrdemServicoItem[Produto]" id="OrdemServicoItem_produtos" />
            <input type="hidden" name="OrdemServicoItem[Servico]" id="OrdemServicoItem_servicos" />

            <div>
                <h4>Produtos adicionados:</h4>
                <table class="acl_section">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Remover</th>
                        </tr>
                    </thead>
                    <tbody id="produtos_adicionados">
                        <?= OrdemServicoHelper::renderItens(1, $model->ordemServicoItens) ?>
                    </tbody>
                </table>
            </div>
            <div>
                <h4>Serviços adicionados:</h4>
                <table class="acl_section">
                    <thead>
                        <tr>
                            <th>Serviço</th>
                            <th>Preço</th>
                            <th>Remover</th>
                        </tr>
                    </thead>
                    <tbody id="servicos_adicionados">
                        <?= OrdemServicoHelper::renderItens("produto", $model->ordemServicoItens) ?>
                    </tbody>
                </table>
            </div>

        </div> 
        <div role="tabpanel" class="tab-pane fade" id="pagamento" aria-labelledby="pagamento-tab">

        </div> 
    </div>

    <?php echo $form->errorSummary($model); ?>



    <!--    <div class="row">
            <//?php echo $form->labelEx($model, 'forma_pagamento_id'); ?>
            <//?php
            $this->widget('ext.select2.ESelect2', array(
                'model' => $model,
                'attribute' => 'forma_pagamento_id',
                'data' => $model->aFormasPagemento,
                'options' => array(
                    'placeholder' => 'Forma de pagamento',
                    'allowClear' => false,
                ),
                'htmlOptions' => array(
                    'id' => 'select2_forma_pagamento_id',
                ),
            ));
            ?>
    <//?php echo $form->error($model, 'forma_pagamento_id'); ?>
        </div>-->

    <div class="row buttons">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'success',
            'size' => 'medium',
            'buttonType' => 'submit',
            'label' => $model->isNewRecord ? 'Abrir ordem de serviço' : 'Atualizar'
                )
        );
        ?>
    </div>

    <?php $this->endWidget(); ?>

</div>
<script>

    var identificador = 1500;
    var aProdutos = new Array;
    var aServicos = new Array;
    var clienteId = '<?= $model->cliente_id ?>';
    var clienteCarroId = '<?= $model->cliente_carro_id ?>';
    
    <?php if(!empty($model->ordemServicoItens)): ?>
        <?php foreach ($model->ordemServicoItens as $model){
            
        } ?>
    <?php endif; ?>

    var removerServico = function (tipoItem, itemId, identificadorId) {
        if (tipoItem == 1) {
            var index = aProdutos.indexOf(itemId);
            if (index != -1) {
                aProdutos.splice(index, 1);
                $('#OrdemServicoItem_produtos').val(aProdutos);
                $('tr[identificador=produto_' + identificadorId + ']').remove();
            }
            console.log(aProdutos);
        }
        if (tipoItem == 2) {
            var index = aServicos.indexOf(itemId);
            if (index != -1) {
                aServicos.splice(index, 1);
                $('#OrdemServicoItem_servicos').val(aServicos);
                $('tr[identificador=servico_' + identificadorId + ']').remove();
            }
            console.log(aServicos);
        }
    }

    var adicionarItem = function (tipoItem, itemId) {
        if (itemId !== "" && tipoItem !== "") {
            if (tipoItem == 1) {
                var objItem = $('#produto_' + itemId);
                aProdutos.push(parseInt(itemId));
                $('#OrdemServicoItem_produtos').val(aProdutos);
                var html = '';
                html += '<tr identificador="produto_' + identificador + '">';
                html += '<td>' + objItem.attr('text') + '</td>';
                html += '<td> R$' + number_format(objItem.attr('preco'), 2, ',', '.') + '</td>';
                html += '<td>';
                html += '<a href="javascript:void(0)" class="remove" onclick="removerServico(' + tipoItem + ', ' + objItem.attr('objId') + ', ' + identificador + ')">';
                html += '<i class="fa fa-times"></i>';
                html += '</a>';
                html += '</td>';
                html += '</tr>';
                $('#produtos_adicionados').append(html);
            }
            if (tipoItem == 2) {
                var objItem = $('#servico_' + itemId);
                var html = '';
                html += '<tr identificador="servico_' + identificador + '">';
                html += '<td>' + objItem.attr('text') + '</td>';
                html += '<td> R$' + number_format(objItem.attr('preco'), 2, ',', '.') + '</td>';
                html += '<td><a href="javascript:void(0)" class="remove" onclick="removerServico(' + tipoItem + ', ' + objItem.attr('objId') + ', ' + identificador + ')"><i class="fa fa-times"></i></a></td>';
                html += '</tr>';
                $('#servicos_adicionados').append(html);
                aServicos.push(parseInt(itemId));
                $('#OrdemServicoItem_servicos').val(aServicos);
            }
            identificador++;
        }
    }

    $('#btn_add_item').click(function () {
        if ($('#select2_tipo_item_id').val() !== "" &&$("#OrdemServicoItem_item_id").val() !== "") {
            adicionarItem($('#select2_tipo_item_id').val(), $("#OrdemServicoItem_item_id").val());
        } else {
            alert('Favor selecionar um item.');
        }
    });

    function format(data) {
        if (!data.id) {
            return data.text;
        }
        var state = $('<span>' + data.text + '</span><span objId="' + data.id + '" text="' + data.text + '"  id="' + data.tipoItem + '_' + data.id + '" preco=' + data.preco + ' style="float: right">R$' + number_format(data.preco, 2, ',', '.') + '</span>');
        return state;
    }
    ;

    function format2(item) {
        if (!item.id) {
            return item.text;
        }
        var state = $('<span objId="' + item.id + '" text="' + item.text + '"  id="' + item.tipoItem + '_' + item.id + '" preco=' + item.preco + '>' + item.text + '</span>');
        return state;
    }
    ;

    var carregaItens = function (tipoItemId) {
        $("#OrdemServicoItem_item_id").parents('div').css('display', '');
        $.ajax({
            url: "<?= Yii::app()->createUrl('ordemServico/getItensPorTipoJson') ?>",
            type: "POST",
            data: {
                tipoItemId: tipoItemId,
            },
            success: function (data) {
                $("#OrdemServicoItem_item_id").select2({
                    formatResult: format,
                    formatSelection: format2,
                    data: $.parseJSON(data),
                    escapeMarkup: function (m) {
                        return m;
                    }
                });
                $('#add_item').css('display', '');
            },
        });
    }

    var carregaSelect2Carros = function (clienteId) {
        $("#OrdemServico_cliente_carro_id").parents('div').css('display', '');
        $.ajax({
            url: "<?= Yii::app()->createUrl('clienteCarro/getDataJson') ?>",
            type: "POST",
            data: {
                clienteId: clienteId,
            },
            success: function (data) {
                $("#OrdemServico_cliente_carro_id").select2({
                    data: $.parseJSON(data),
                });
            },
        });
    }
    $(document).ready(function () {
        if (clienteId !== "") {
            $("#OrdemServico_cliente_carro_id").parents('div').css('display', '');
            carregaSelect2Carros(clienteId);
            if (clienteCarroId !== "") {
                $("#OrdemServico_cliente_carro_id").val(clienteCarroId);
            }
        }
    });

    $('#select2_cliente_id').click(function () {
        if ($("#OrdemServico_cliente_carro_id").val() !== "") {
            $("#OrdemServico_cliente_carro_id").select2('data', null);
        }
        carregaSelect2Carros($(this).val());
    });

    $('#select2_tipo_item_id').click(function () {
        if ($("#OrdemServicoItem_item_id").val() !== "") {
            $("#OrdemServicoItem_item_id").select2('data', null);
        }
        $('#add_item').css('display', 'none');
        carregaItens($(this).val());
    });

</script>