<?php
/* @var $this DespesaController */
/* @var $model Despesa */
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
        <?= $form->textField($model, 'tipo_despesa_id', array('placeholder' => 'Tipo Despesa')) ?>
    </div>

    <div class="row">
        <?= $form->textField($model, 'preco', array('placeholder' => 'Preço')) ?>
    </div>

    <div class="row">
        <?= $form->textField($model, 'quantidade', array('placeholder' => 'Quantidade')) ?>
    </div>

    <div class="row">
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'language' => 'pt',
            'attribute' => 'data_hora_inicial',
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'constrainInput' => 'false',
            ),
            'htmlOptions' => array(
                'placeholder' => 'Data Inicial'
            ),
        ));
        ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'language' => 'pt',
            'attribute' => 'data_hora_final',
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
                'changeMonth' => 'true',
                'changeYear' => 'true',
                'constrainInput' => 'false',
            ),
            'htmlOptions' => array(
                'placeholder' => 'Data Final'
            ),
        ));
        ?>
    </div>

    <div class="row">
        <?= $form->textField($model, 'usuario_id', array('placeholder' => 'Usuário')) ?>
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