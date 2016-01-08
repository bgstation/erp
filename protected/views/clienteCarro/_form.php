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
        <?php echo $form->labelEx($model, 'marca_id'); ?>
        <?php
        $this->widget('ext.select2.ESelect2', array(
            'model' => $model,
            'attribute' => 'marca_id',
            'data' => CHtml::listData($oMarcas, 'id', 'titulo'),
            'options' => array(
                'placeholder' => 'Marca',
                'allowClear' => false,
            ),
            'htmlOptions' => array(
                'id' => 'select2_marca_id',
            ),
        ));
        ?>
        <?php if (Yii::app()->user->checkAccess('marca/create')): ?>
            <a href="<?= Yii::app()->createUrl('marca/create') ?>" title="Adicionar uma nova marca.">
                <i class="fa fa-plus-square"></i>
            </a>
        <?php endif; ?>
        <?php echo $form->error($model, 'marca_id'); ?>
    </div>
    
    <div class="row modelo" style="display: none">
        <?php echo $form->labelEx($model, 'modelo_id'); ?>
        <input type="hidden" name="ClienteCarro[modelo_id]" id="select2_modelo_id">
        <?php if (Yii::app()->user->checkAccess('modelo/create')): ?>
            <a href="<?= Yii::app()->createUrl('modelo/create') ?>" title="Adicionar um novo modelo.">
                <i class="fa fa-plus-square"></i>
            </a>
        <?php endif; ?>
        <?php echo $form->error($model, 'modelo_id'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'cor_id'); ?>
        <?php
        $this->widget('ext.select2.ESelect2', array(
            'model' => $model,
            'attribute' => 'cor_id',
            'data' => CHtml::listData($oCores, 'id', 'titulo'),
            'options' => array(
                'placeholder' => 'Cor',
                'allowClear' => false,
            ),
            'htmlOptions' => array(
                'id' => 'select2_cor_id',
            ),
        ));
        ?>
        <?php if (Yii::app()->user->checkAccess('cor/create')): ?>
            <a href="<?= Yii::app()->createUrl('cor/create') ?>" title="Adicionar uma nova cor.">
                <i class="fa fa-plus-square"></i>
            </a>
        <?php endif; ?>
        <?php echo $form->error($model, 'cor_id'); ?>
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

<script>

    var marcaId = '<?= $model->marca_id ?>';
    var modeloId = '<?= $model->modelo_id ?>';

    var carregaSelect2Modelos = function (marcaId) {
        $("#select2_modelo_id").parents('div').css('display', '');
        $.ajax({
            url: "<?= Yii::app()->createUrl('modelo/getDataJson') ?>",
            type: "POST",
            data: {
                marcaId: marcaId,
            },
            success: function (data) {
                $("#select2_modelo_id").select2({
                    data: $.parseJSON(data),
                });
            },
        });
    }
    $(document).ready(function () {
        if (marcaId !== "") {
            $("#select2_modelo_id").parents('div').css('display', '');
            carregaSelect2Modelos(marcaId);
            if (modeloId !== "") {
                $("#select2_modelo_id").val(modeloId);
            }
        }

    })

    $('#select2_marca_id').click(function () {
        $("#select2_modelo_id").select2('data', null)
        carregaSelect2Modelos($(this).val());
    });

</script>