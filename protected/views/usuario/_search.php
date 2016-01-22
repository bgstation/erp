<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <div class="row">
        <?= $form->textField($model, 'nome', array('placeholder' => 'Nome')) ?>
    </div>

    <div class="row">
        <?= $form->textField($model, 'login', array('placeholder' => 'Login')) ?>
    </div>

    <div class="row">
        <?= $form->textField($model, 'acl_tipo_usuario_id', array('placeholder' => 'Tipo Usuário')) ?>
    </div>
    
    <div class="row">
        <?= $form->label($model, 'excluido') ?>
        <?= $form->checkbox($model, 'excluido') ?>
    </div>

    <div class='rows search-buttons'>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'success',
            'size' => 'medium',
            'buttonType' => 'submit',
            'label' => 'Filtrar',
            'htmlOptions' => array(
                'class' => 'pull-left'
            )
                )
        );
        $this->widget('bootstrap.widgets.TbButton', array(
            'size' => 'medium',
            'buttonType' => 'button',
            'label' => 'Limpar',
            'htmlOptions' => array(
                'class' => 'pull-left reset-form'
            )
                )
        );
        ?>
    </div>

    <?php $this->endWidget() ?>

</div>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/jquery.mask.js"></script>