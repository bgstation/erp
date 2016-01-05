<?php
/* @var $this ClienteCarroController */
/* @var $model ClienteCarro */
/* @var $form CActiveForm */
?>
<style>

    #ClienteCarro_placa{
        text-transform:uppercase
    }

</style>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'cliente-carro-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Os campos com <span class="required">*</span> são obrigatórios.</p>

        <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'placa'); ?>
<?php echo $form->textField($model, 'placa', array('size' => 8, 'maxlength' => 8)); ?>
<?php echo $form->error($model, 'placa'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'marca_carro_id'); ?>
        <?php
        $this->widget('ext.select2.ESelect2', array(
            'model' => $model,
            'attribute' => 'marca_carro_id',
            'data' => $model->aMarcaCarro,
            'options' => array(
                'placeholder' => 'Selecione o tipo da biblioteca',
                'allowClear' => false,
            ),
            'htmlOptions' => array(
                'id' => 'select2_sexo',
                'style' => 'width: 100%'
            ),
        ));
        ?>
<?php echo $form->error($model, 'marca_carro_id'); ?>
    </div>
        
    <input type="hidden" value="<?= $_GET['clienteId'] ?>" name="ClienteCarro[cliente_id]" id="ClienteCarro_cliente_id">

    <div class="row">
        <?php echo $form->labelEx($model, 'observacao'); ?>
<?php echo $form->textArea($model, 'observacao', array('rows' => 6, 'class' => 'span10')); ?>
<?php echo $form->error($model, 'observacao'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'excluido'); ?>
<?php echo $form->checkBox($model, 'excluido'); ?>
<?php echo $form->error($model, 'excluido'); ?>
    </div>

    <div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar'); ?>
    </div>

<?php $this->endWidget(); ?>

    <script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/jquery.mask.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/clienteCarro/_form.js"></script>

</div><!-- form -->