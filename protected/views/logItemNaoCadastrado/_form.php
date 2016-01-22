<?php
/* @var $this LogItemNaoCadastradoController */
/* @var $model LogItemNaoCadastrado */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'log-item-nao-cadastrado-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Os campos com <span class="required">*</span> são obrigatórios.</p>

    <?= $form->errorSummary($model) ?>

    <div class="row">
        <?= $form->labelEx($model, 'titulo') ?>
        <?= $form->textField($model, 'titulo', array('readonly' => 'readonly')) ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'preco') ?>
        <?= $form->textField($model, 'preco', array('readonly' => 'readonly')) ?>
    </div>
    
    <div class="row">
        <?= $form->labelEx($model, 'usuario_id') ?>
        <?= CHtml::textField('usuario_id', $model->usuario->nome, array('readonly' => 'readonly')) ?>
    </div>
    
    <?= $form->hiddenField($model, 'ordem_servico_item_id') ?>

    <div class="row buttons">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'success',
            'size' => 'medium',
            'buttonType' => 'submit',
            'label' => 'Atualizar'
                )
        );
        ?>
    </div>

    <?php $this->endWidget() ?>

</div>