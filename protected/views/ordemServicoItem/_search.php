<?php
/* @var $this OrdemServicoItemController */
/* @var $model OrdemServicoItem */
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
        <?= $form->textField($model, 'ordem_servico_id', array('placeholder' => 'Nº Ordem de Serviço')) ?>
    </div>

    <div class="row">
        <?= $form->textField($model, 'preco', array('placeholder' => 'Preço')) ?>
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