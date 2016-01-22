<?php
/* @var $this ProdutoController */
/* @var $model Produto */
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
        <?= $form->textField($model, 'titulo', array('placeholder' => 'Título')) ?>
    </div>

    <div class="row">
        <?= $form->textField($model, 'codigo_barra', array('placeholder' => 'Código de Barras')) ?>
    </div>

    <div class="row">
        <?= $form->textField($model, 'marca_id', array('placeholder' => 'Marca')) ?>
    </div>

    <div class="row">
        <?= $form->textField($model, 'modelo_id', array('placeholder' => 'Modelo')) ?>
    </div>

    <div class="row">
        <?= $form->textField($model, 'preco', array('placeholder' => 'Preço')) ?>
    </div>

    <div class="row">
        <?= $form->textField($model, 'quantidade', array('placeholder' => 'Quantidade')) ?>
    </div>
    
    <div class="row">
        <?= $form->textField($model, 'tipo_produto_id', array('placeholder' => 'Tipo Produto')) ?>
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