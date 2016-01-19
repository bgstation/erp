<?php
/* @var $this OrdemServicoController */
/* @var $model OrdemServico */
/* @var $form CActiveForm */
//echo '<pre>';
//    die(var_dump($model->ordemServicoItens));
?>

<div class="form">
    <p class="note">Os campos com <span class="required">*</span> são obrigatórios.</p>
    <div class="row">
        <h4>Resumo</h4>
        <div class="row">
            <input type="text" readonly value="<?= $model->cliente->nome ?>" />
        </div>
        <div class="row">
            <input type="text" readonly value="<?= $model->clienteCarro->placa ?>" />
        </div>
        <div class="row">
            <textarea type="text" readonly style="width: 300px; height: 150px"><?= $oLogOrdemServico->observacao ?></textarea>
        </div>
        <div class="row">
            <div>
                <table class="acl_section">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                        </tr>
                    </thead>
                    <tbody id="tipo_item_1_adicionados">
                        <?= OrdemServicoHelper::renderItens(1, $model->ordemServicoItens, false) ?>
                    </tbody>
                </table>
            </div>
            <div>
                <table class="acl_section">
                    <thead>
                        <tr>
                            <th>Serviços</th>
                            <th>Preço</th>
                        </tr>
                    </thead>
                    <tbody id="tipo_item_1_adicionados">
                        <?= OrdemServicoHelper::renderItens(2, $model->ordemServicoItens, false) ?>
                    </tbody>
                </table>
            </div>
            <p><strong id="valorTotal">R$ <?= number_format($valor_total, 2, ',', '.') ?></strong></p>
        </div>
    </div>

    <div class="row">
        <h4>Finalizar</h4>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'ordem-servico-form',
            'enableAjaxValidation' => false,
        ));
        ?>
        <?php echo $form->labelEx($oOrdemServicoTipoPagamento, 'forma_pagamento_id'); ?>
        <?php
        $this->widget('ext.select2.ESelect2', array(
            'model' => $oOrdemServicoTipoPagamento,
            'attribute' => '[1]forma_pagamento_id',
            'data' => $oOrdemServicoTipoPagamento->aFormasPagamento,
            'options' => array(
                'placeholder' => 'Forma de pagamento',
                'allowClear' => false,
            ),
            'htmlOptions' => array(
                'id' => 'select2_forma_pagamento_id_1',
                'onclick' => 'addFormaPagamento(1, $(this).val())',
            ),
        ));
        ?>
        <?php echo $form->error($model, 'forma_pagamento_id'); ?>
        <?php echo $form->textField($oOrdemServicoTipoPagamento, '[1]valor', array('readonly' => 'readonly', 'class' => 'preco monetario', 'style' => 'margin-top: 0px; margin-left: 5px', 'value' => number_format($valor_total, 2))); ?>
        <?php echo $form->textField($oOrdemServicoTipoPagamento, '[1]parcelas', array('style' => 'margin-top: 0px; margin-left: 5px; display: none')); ?>
        <br>
        <?php
        $this->widget('ext.select2.ESelect2', array(
            'model' => $oOrdemServicoTipoPagamento,
            'attribute' => '[2]forma_pagamento_id',
            'data' => $oOrdemServicoTipoPagamento->aFormasPagamento,
            'options' => array(
                'placeholder' => 'Forma de pagamento',
                'allowClear' => true,
            ),
            'htmlOptions' => array(
                'id' => 'select2_forma_pagamento_id_2',
                'onclick' => 'addFormaPagamento(2, $(this).val())',
            ),
        ));
        ?>
        <?php echo $form->error($model, 'forma_pagamento_id'); ?>
        <?php echo $form->textField($oOrdemServicoTipoPagamento, '[2]valor', array('readonly' => 'readonly', 'class' => 'preco monetario', 'style' => 'margin-top: 0px; margin-left: 5px', 'onchange' => 'atualizaValores()')); ?>
        <?php echo $form->textField($oOrdemServicoTipoPagamento, '[2]parcelas', array('style' => 'margin-top: 0px; margin-left: 5px; display: none')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'desconto'); ?>
        <?php echo $form->textField($model, 'desconto', array('class' => 'monetario')); ?>
        <?php echo $form->error($model, 'desconto'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($oLogOrdemServico, 'observacao'); ?>
        <?php echo $form->textArea($oLogOrdemServico, 'observacao', array('rows' => 6, 'cols' => 50, 'value' => '')); ?>
        <?php echo $form->error($oLogOrdemServico, 'observacao'); ?>
    </div>

    <div class="row buttons">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'success',
            'size' => 'medium',
            'buttonType' => 'submit',
            'label' => 'Finalizar',
                )
        );
        ?>
    </div>

    <?php echo $form->errorSummary($model); ?>

    <?php $this->endWidget(); ?>

    <script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/jquery.mask.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/ordemServico/_finalizar.js"></script>

</div>

<script>
    var valorTotalOri = <?= $valor_total ?>;
    var valorTotal = <?= $valor_total ?>;
    var desconto = 0;

    $("#select2_forma_pagamento_id_1").val(1);

    var resetarValor = function (tudo) {
        if (tudo) {
            $("#select2_forma_pagamento_id_1").val(1);
            $("#OrdemServicoTipoPagamento_1_valor").val(number_format(valorTotalOri - desconto, 2, ',', '.'));
            $("#select2_forma_pagamento_id_2").select2('val','');
        }
        $("#OrdemServicoTipoPagamento_2_valor").val(null);
        $("#OrdemServicoTipoPagamento_2_valor").attr('readonly', 'readonly');
        $('#OrdemServicoTipoPagamento_2_parcelas').css('display', 'none');
        $('#OrdemServicoTipoPagamento_2_parcelas').val(null);
    }

    var addFormaPagamento = function (indentificador, id) {
        if (id !== "" && indentificador == 2) {
            $('#OrdemServicoTipoPagamento_' + indentificador + '_valor').removeAttr('readonly');
        }
        if (id == 3) {
            $('#OrdemServicoTipoPagamento_' + indentificador + '_parcelas').css('display', '');
        } else {
            $('#OrdemServicoTipoPagamento_' + indentificador + '_parcelas').css('display', 'none');
            $('#OrdemServicoTipoPagamento_' + indentificador + '_parcelas').val(null);
        }
    }

    $("#select2_forma_pagamento_id_2").change(function () {
        if ($(this).val() === "") {
            resetarValor(false);
        }
    })

    $(".preco").focus(function () {

    }).blur(function () {
        var valorTmp = parseFloat($(this).val().replace('.', '').replace(',', '.'));
        if ($(this).val() !== "") {
            if (valorTmp > valorTotal) {
                alert('Valor inválido!');
                $(this).val(null);
                return false;
            } else {
                $("#OrdemServicoTipoPagamento_1_valor").val(number_format(valorTotal - valorTmp, 2, ',', '.'));
            }
        }
    });

    $('#OrdemServico_desconto').blur(function () {
        var valorTmp = parseFloat($(this).val().replace('.', '').replace(',', '.'));
        if (valorTmp !== desconto) {           
            if ($(this).val() !== "") {
                desconto = parseFloat($(this).val().replace('.', '').replace(',', '.'));
                if (valorTmp > valorTotalOri) {
                    alert('Valor inválido!');
                    $(this).val(null);
                    return false;
                } else {
                    valorTotal = valorTotalOri - valorTmp;
                    $("#valorTotal").text('R$ ' + number_format(valorTotal, 2, ',', '.'));
                    resetarValor(true);
                }
            }
        }
    });


</script>