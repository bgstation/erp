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
        <?= $form->passwordField($model, 'senha', array('size' => 20, 'maxlength' => 20)) ?>
        <?= $form->error($model, 'senha') ?>
        <?= !$model->isNewRecord ? '<p>Preencha apenas caso queira alterar a senha</p>' : '' ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'acl_tipo_usuario_id') ?>
        <?php
        $this->widget('ext.select2.ESelect2', array(
            'model' => $model,
            'attribute' => 'acl_tipo_usuario_id',
            'data' => CHtml::listData($oAclTiposUsuarios, 'id', 'titulo'),
            'options' => array(
                'placeholder' => 'Tipo do usuário',
                'allowClear' => false,
            ),
            'htmlOptions' => array(
                'id' => 'select2_acl_tipo_usuario_id',
            ),
        ));
        ?>
        <?= $form->error($model, 'acl_tipo_usuario_id') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'excluido') ?>
        <?= $form->checkBox($model, 'excluido') ?>
        <?= $form->error($model, 'excluido') ?>
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