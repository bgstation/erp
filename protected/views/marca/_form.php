<?php
/* @var $this MarcaController */
/* @var $model Marca */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'marca-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observacao'); ?>
		<?php echo $form->textArea($model,'observacao',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observacao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'excluido'); ?>
		<?php echo $form->checkBox($model,'excluido'); ?>
		<?php echo $form->error($model,'excluido'); ?>
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

</div><!-- form -->