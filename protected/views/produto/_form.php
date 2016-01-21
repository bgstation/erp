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

    <div class="row">
        <?= $form->labelEx($model, 'titulo') ?>
        <?= $form->textField($model, 'titulo', array('size' => 60, 'maxlength' => 200)) ?>
        <?= $form->error($model, 'titulo') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'codigo_barra') ?>
        <?= $form->textField($model, 'codigo_barra', array('size' => 60, 'maxlength' => 300)) ?>
        <?= $form->error($model, 'codigo_barra') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'tipo_produto_id') ?>
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
        <?php endif ?>
        <?= $form->error($model, 'tipo_produto_id') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'marca_id') ?>
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
        <?php endif ?>
        <?= $form->error($model, 'marca_id') ?>
    </div>

    <div class="row modelo" style="display: none">
        <?= $form->labelEx($model, 'modelo_id') ?>
        <input type="hidden" name="Produto[modelo_id]" id="select2_modelo_id">
        <?php if (Yii::app()->user->checkAccess('modelo/create')): ?>
            <a href="<?= Yii::app()->createUrl('modelo/create') ?>" title="Adicionar um novo modelo.">
                <i class="fa fa-plus-square"></i>
            </a>
        <?php endif ?>
        <?= $form->error($model, 'modelo_id') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'preco') ?>
        <?= $form->textField($model, 'preco', array('size' => 10, 'maxlength' => 10)) ?>
        <?= $form->error($model, 'preco') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'observacao') ?>
        <?= $form->textArea($model, 'observacao', array('rows' => 6, 'cols' => 50)) ?>
        <?= $form->error($model, 'observacao') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'quantidade') ?>
        <?= $form->numberField($model, 'quantidade') ?>
        <?= $form->error($model, 'quantidade') ?>
    </div>

    <div class="row">
        <?= $form->labelEx($model, 'excluido') ?>
        <?= $form->checkBox($model, 'excluido') ?>
        <?= $form->error($model, 'excluido') ?>
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
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/produto/_form.js"></script>
<script type="text/javascript">
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