<div class="row">
    <?= $form->labelEx($model, 'cliente_id') ?>
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
    <?= $form->error($model, 'cliente_id') ?>
</div>

<div class="row oculta">
    <?= $form->labelEx($model, 'cliente_carro_id') ?>
    <?= $form->hiddenField($model, 'cliente_carro_id') ?>
    <?= $form->error($model, 'cliente_carro_id') ?>
</div>

<div class="row">
    <?= $form->labelEx($model, 'desconto') ?>
    <?= $form->textField($model, 'desconto', array('class' => 'preco')) ?>
    <?= $form->error($model, 'desconto') ?>
</div>

<div class="row">
    <?= $form->labelEx($model, 'observacao') ?>
    <?= $form->textArea($model, 'observacao', array('rows' => 6, 'cols' => 50)) ?>
    <?= $form->error($model, 'observacao') ?>
</div>

<div class="row">
    <?= $form->labelEx($model, 'excluido') ?>
    <?= $form->checkBox($model, 'excluido') ?>
    <?= $form->error($model, 'excluido') ?>
</div>
<div class="row buttons">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'size' => 'medium',
        'buttonType' => 'button',
        'label' => 'Continuar',
        'htmlOptions' => array(
            'onclick' => 'alterarTab("cliente", "servicos")'
        ),
            )
    );
    ?>
</div>