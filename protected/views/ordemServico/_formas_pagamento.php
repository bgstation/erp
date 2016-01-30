<?php if ($atualizar) : ?>
    <label for="OrdemServicoTipoPagamento_forma_pagamento_id">Forma de pagamento</label>
    <?php $cont = 1; ?>
    <?php foreach ($oOrdemServicoTipoPagamento as $formasPagamento) : ?>
        <div class="row">
            <?php
            $ocultaParcelas = $formasPagamento->forma_pagamento_id != OrdemServicoTipoPagamento::CREDITO ? 'oculta' : '';
            $this->widget('ext.select2.ESelect2', array(
                'model' => $formasPagamento,
                'attribute' => '[' . $cont . ']forma_pagamento_id',
                'data' => $formasPagamento->aFormasPagamento,
                'options' => array(
                    'placeholder' => 'Forma de pagamento',
                    'allowClear' => $cont == 1 ? false : true,
                ),
                'htmlOptions' => array(
                    'id' => 'select2_forma_pagamento_id_' . $cont,
                    'onclick' => 'addFormaPagamento(' . $cont . ', $(this).val())',
                ),
            ));
            ?>
            <?= $form->error($model, 'forma_pagamento_id') ?>
            <?= $form->textField($formasPagamento, '[' . $cont . ']valor', array('class' => 'preco monetario', 'disabled' => 'disabled', 'value' => FormatHelper::valorMonetario($formasPagamento->valor), 'placeholder' => 'Valor')) ?>
            <?= $form->textField($formasPagamento, '[' . $cont . ']parcelas', array('class' => 'parcelas ' . $ocultaParcelas, 'placeholder' => 'Nº de Parcelas', 'value' => $formasPagamento->parcelas)) ?>
        </div>
        <?php $cont++; ?>
    <?php endforeach; ?>

    <?php if (count($oOrdemServicoTipoPagamento) == 1) : ?>
        <div class="row">
            <?php
            $formasPagamento = new OrdemServicoTipoPagamento();
            $this->widget('ext.select2.ESelect2', array(
                'model' => $formasPagamento,
                'attribute' => '[2]forma_pagamento_id',
                'data' => $formasPagamento->aFormasPagamento,
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
            <?= $form->error($model, 'forma_pagamento_id') ?>
            <?= $form->textField($formasPagamento, '[2]valor', array('class' => 'preco monetario', 'disabled' => 'disabled', 'placeholder' => 'Valor')) ?>
            <?= $form->textField($formasPagamento, '[2]parcelas', array('class' => 'parcelas oculta', 'placeholder' => 'Nº de Parcelas')) ?>
        </div>
    <?php endif; ?>

<?php else : ?>
    <div class="row">
        <?= $form->labelEx($oOrdemServicoTipoPagamento, 'forma_pagamento_id') ?>
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
        <?= $form->error($model, 'forma_pagamento_id') ?>
        <?= $form->textField($oOrdemServicoTipoPagamento, '[1]valor', array('class' => 'preco monetario', 'disabled' => 'disabled', 'value' => FormatHelper::valorMonetario($valor_total), 'placeholder' => 'Valor')) ?>
        <?= $form->textField($oOrdemServicoTipoPagamento, '[1]parcelas', array('class' => 'parcelas oculta', 'placeholder' => 'Nº de Parcelas')) ?>
    </div>

    <div class="row">
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
        <?= $form->error($model, 'forma_pagamento_id') ?>

        <?= $form->textField($oOrdemServicoTipoPagamento, '[2]valor', array('class' => 'preco monetario', 'disabled' => 'disabled', 'placeholder' => 'Valor')) ?>
        <?= $form->textField($oOrdemServicoTipoPagamento, '[2]parcelas', array('class' => 'parcelas oculta', 'placeholder' => 'Nº de Parcelas')) ?>
    </div>
<?php endif; ?>