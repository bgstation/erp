<?php
/* @var $this DespesaController */
/* @var $model Despesa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'despesa-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_despesas_id'); ?>
		<?php $this->widget('ext.select2.ESelect2', array(
                    'model' => $model,
                    'attribute' => 'tipo_despesas_id',
                    'data' => CHtml::listData($oTiposDespesa, 'id', 'titulo'),
                    'options' => array(
                        'placeholder' => 'Tipo de despesa',
                        'allowClear' => false,
                    ),
                    'htmlOptions' => array(
                        'id' => 'select2_tipo_despesas_id',
                    ),
                )); ?>
		<?php echo $form->error($model,'tipo_despesas_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preco'); ?>
		<?php echo $form->textField($model,'preco',array('size'=>10,'maxlength'=>10, 'class' => 'preco')); ?>
		<?php echo $form->error($model,'preco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observacao'); ?>
		<?php echo $form->textArea($model,'observacao',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observacao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quantidade'); ?>
		<?php echo $form->textField($model,'quantidade'); ?>
		<?php echo $form->error($model,'quantidade'); ?>
	</div>
        
	<div class="row buttons">
		<?php
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'type' => 'success',
                        'size' => 'medium',
                        'buttonType' => 'submit',
                        'label' => $model->isNewRecord ? 'Cadastrar' : 'Atualizar',
                            )
                    );
                ?>
	</div>

<?php $this->endWidget(); ?>
        
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/despesa/_form.js"></script>

</div><!-- form -->