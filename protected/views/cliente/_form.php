<?php
/* @var $this ClienteController */
/* @var $model Cliente */
/* @var $form CActiveForm */
?>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'cliente-form',
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
        <?= $form->labelEx($model, 'email') ?>
        <?= $form->emailField($model, 'email', array('size' => 60, 'maxlength' => 100)) ?>
        <?= $form->error($model, 'email') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'cpf') ?>
        <?= $form->textField($model, 'cpf', array('size' => 14, 'maxlength' => 14)) ?>
        <?= $form->error($model, 'cpf') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'sexo') ?>
        <?php
        $this->widget('ext.select2.ESelect2', array(
            'model' => $model,
            'attribute' => 'sexo',
            'data' => $model->aSexo,
            'options' => array(
                'placeholder' => 'Sexo',
                'allowClear' => false,
            ),
            'htmlOptions' => array(
                'id' => 'select2_sexo',
            ),
        ));
        ?>
        <?= $form->error($model, 'sexo') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'telefone_fixo') ?>
        <?= $form->textField($model, 'telefone_fixo', array('size' => 20, 'maxlength' => 20)) ?>
        <?= $form->error($model, 'telefone_fixo') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'celular') ?>
        <?= $form->textField($model, 'celular', array('size' => 20, 'maxlength' => 20)) ?>
        <?= $form->error($model, 'celular') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'endereco') ?>
        <?= $form->textField($model, 'endereco', array('size' => 60, 'maxlength' => 100)) ?>
        <?= $form->error($model, 'endereco') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'numero') ?>
        <?= $form->textField($model, 'numero') ?>
        <?= $form->error($model, 'numero') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'complemento') ?>
        <?= $form->textField($model, 'complemento', array('size' => 20, 'maxlength' => 20)) ?>
        <?= $form->error($model, 'complemento') ?>
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

<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/cliente/_form.js"></script>