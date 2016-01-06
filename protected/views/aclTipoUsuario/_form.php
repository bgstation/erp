<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */
/* @var $form CActiveForm */
?>
<style>
    .acl_item{
        width: 150px;
    }

    .acl_section{
        max-width: 300px; float: left;
    }
</style>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/aclTipoUsuario/_form.js"></script>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'tipo-usuario-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Os campos com <span class="required">*</span> são obrigatórios.</p>

    <?= $form->errorSummary($model) ?>

    <div class="row">
        <?= $form->labelEx($model, 'titulo') ?>
        <?= $form->textField($model, 'titulo', array('size' => 20, 'maxlength' => 20)) ?>
        <?= $form->error($model, 'titulo') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'excluido') ?>
        <?= $form->checkbox($model, 'excluido') ?>
        <?= $form->error($model, 'excluido') ?>
    </div>

    <hr>
    <h3>Permissões</h3>
    <div class="row">
        <?= AclRotaHelper::renderAclRotas($aAclRotas, $aAclTipoUsuarioRotas) ?>
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