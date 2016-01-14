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

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'titulo'); ?>
        <?php echo $form->textField($model, 'titulo', array('size' => 60, 'maxlength' => 200)); ?>
        <?php echo $form->error($model, 'titulo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'codigo_barra'); ?>
        <?php echo $form->textField($model, 'codigo_barra', array('size' => 60, 'maxlength' => 300)); ?>
        <?php echo $form->error($model, 'codigo_barra'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'tipo_produto_id'); ?>
        <?php
        $this->widget('ext.select2.ESelect2', array(
            'model' => $model,
            'attribute' => 'tipo_produto_id',
            'data' => CHtml::listData($oTiposProduto, 'id', 'titulo'),
            'options' => array(
                'placeholder' => 'Tipo do produto',
                'allowClear' => false,
            ),
            'htmlOptions' => array(
                'id' => 'select2_tipo_produto_id',
            ),
        ));
        ?>
        <?php if (Yii::app()->user->checkAccess('tipoProduto/create')): ?>
            <a href="<?= Yii::app()->createUrl('tipoProduto/create') ?>" title="Adicionar um tipo novo.">
                <i class="fa fa-plus-square"></i>
            </a>
        <?php endif; ?>
        <?php echo $form->error($model, 'tipo_produto_id'); ?>
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
        <input type="hidden" name="Produto[modelo_id]" id="select2_modelo_id">
        <?php if (Yii::app()->user->checkAccess('modelo/create')): ?>
            <a href="<?= Yii::app()->createUrl('modelo/create') ?>" title="Adicionar um novo modelo.">
                <i class="fa fa-plus-square"></i>
            </a>
        <?php endif; ?>
        <?php echo $form->error($model, 'modelo_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'preco'); ?>
        <?php echo $form->textField($model, 'preco', array('size' => 10, 'maxlength' => 10)); ?>
        <?php echo $form->error($model, 'preco'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'observacao'); ?>
        <?php echo $form->textArea($model, 'observacao', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'observacao'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'quantidade'); ?>
        <?php echo $form->numberField($model, 'quantidade'); ?>
        <?php echo $form->error($model, 'quantidade'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'excluido'); ?>
        <?php echo $form->checkBox($model, 'excluido'); ?>
        <?php echo $form->error($model, 'excluido'); ?>
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

    <?php $this->endWidget(); ?>

    <script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/jquery.mask.js"></script>
    <script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/produto/_form.js"></script>

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