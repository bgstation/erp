<link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/produto/_form.css" />
<?php
/* @var $this ProdutoController */
/* @var $model Produto */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'produto-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Os campos com <span class="required">*</span> são obrigatórios.</p>

    <?= $form->errorSummary($model) ?>

    <?= $form->hiddenField($oLogRetiradaProduto, 'produto_id', array("value" => $model->id)) ?>

    <div class="row">
        <?= $form->labelEx($model, 'titulo') ?>
        <?= $form->textField($model, 'titulo', array('size' => 60, 'maxlength' => 200, 'readonly' => 'readonly')) ?>
        <?= $form->error($model, 'titulo') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($oLogRetiradaProduto, 'quantidade') ?>
        <?= $form->numberField($oLogRetiradaProduto, 'quantidade') ?>
        <?= $form->error($oLogRetiradaProduto, 'quantidade') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($oLogRetiradaProduto, 'observacao') ?>
        <?= $form->textArea($oLogRetiradaProduto, 'observacao') ?>
        <?= $form->error($oLogRetiradaProduto, 'observacao') ?>
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