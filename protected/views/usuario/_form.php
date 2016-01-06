<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'usuario-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Os campos com <span class="required">*</span> são obrigatórios.</p>

    <?= $form->errorSummary($model) ?>

    <div class="row">
        <?= $form->labelEx($model, 'nome') ?>
        <?= $form->textField($model, 'nome', array('size' => 60, 'maxlength' => 100)) ?>
        <?= $form->error($model, 'nome') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'login') ?>
        <?= $form->textField($model, 'login', array('size' => 60, 'maxlength' => 100)) ?>
        <?= $form->error($model, 'login') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'senha') ?>
        <?= $form->textField($model, 'senha', array('size' => 20, 'maxlength' => 20)) ?>
        <?= $form->error($model, 'senha') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'tipo_usuario_id') ?>
        <?= $form->textField($model, 'tipo_usuario_id') ?>
        <?= $form->error($model, 'tipo_usuario_id') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'excluido') ?>
        <?= $form->textField($model, 'excluido') ?>
        <?= $form->error($model, 'excluido') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'data_cadastro') ?>
        <?= $form->textField($model, 'data_cadastro') ?>
        <?= $form->error($model, 'data_cadastro') ?>
    </div>

    <div class="row buttons">
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'success',
            'size' => 'medium',
            'buttonType' => 'submit',
            'label' => $model->isNewRecord ? 'Cadastrar' : 'Atualizar'
                )
        );
        ?>
    </div>

    <?php $this->endWidget() ?>

</div>