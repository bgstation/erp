<?php
/* @var $this OrdemServicoController */
/* @var $model OrdemServico */
/* @var $form CActiveForm */
//echo '<pre>';
//    die(var_dump($model->ordemServicoItens));
?>

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
                <?php echo $form->hiddenField($oOrdemServicoItem, 'item_id', array('onclick' => 'checarNaoCadastrado($(this).val())')); ?>
                <?php echo $form->error($oOrdemServicoItem, 'item_id'); ?>
            </div>

            <div class="row itens_nao_cadastrados">
                <?php echo $form->textField($oLogItemNaoCadastrador, 'titulo', array('style' => 'display: none', 'placeholder' => 'Descrição')); ?>
                <?php echo $form->textField($oLogItemNaoCadastrador, 'preco', array('style' => 'display: none', 'placeholder' => 'Preço', 'class' => 'preco')); ?>
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
                <table class="acl_section">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Remover</th>
                        </tr>
                    </thead>
                    <tbody id="tipo_item_1_adicionados">
                        <?= OrdemServicoHelper::renderItens(1, $model->ordemServicoItens) ?>
                    </tbody>
                </table>
            </div>
            <div>
                <table class="acl_section">
                    <thead>
                        <tr>
                            <th>Serviço</th>
                            <th>Preço</th>
                            <th>Remover</th>
                        </tr>
                    </thead>
                    <tbody id="tipo_item_2_adicionados">
                        <?= OrdemServicoHelper::renderItens(2, $model->ordemServicoItens) ?>
                    </tbody>
                </table>
            </div>
            <p id="valor_total" total="<?= $valor_total ?>">Total: R$<span><?= number_format($valor_total, 2, ',', '.') ?></span></p>
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
            'label' => $model->isNewRecord ? 'Abrir ordem de serviço' : 'Atualizar',
            'htmlOptions' => array(
                'onclick' => 'acoesFinalizar()'
            ),
                )
        );
        ?>
    </div>

    <?php $this->endWidget(); ?>

    <script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/jquery.mask.js"></script>
    <script>
        var clienteId = '<?= $model->cliente_id ?>';
        var clienteCarroId = '<?= $model->cliente_carro_id ?>';
    </script>
    <script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/ordemServico/_form.js"></script>

</div>
<script>
<?php if (!empty($model->ordemServicoItens)): ?>
    <?php
    foreach ($model->ordemServicoItens as $model) {
        if ($model->tipo_item_id == 1):
            ?>
                    aProdutos.push(parseInt('<?= $model->item_id ?>'));
            <?php
        endif;
        if ($model->tipo_item_id == 2):
            ?>
                    aServicos.push(parseInt('<?= $model->item_id ?>'));
        <?php endif; ?>

    <?php } ?>
<?php endif; ?>

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

</script>