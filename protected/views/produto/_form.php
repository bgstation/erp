<?php
/* @var $this ProdutoController */
/* @var $model Produto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'produto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo_barra'); ?>
		<?php echo $form->textField($model,'codigo_barra',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'codigo_barra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marca_id'); ?>
		<?php echo $form->textField($model,'marca_id'); ?>
		<?php echo $form->error($model,'marca_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modelo_id'); ?>
		<?php echo $form->textField($model,'modelo_id'); ?>
		<?php echo $form->error($model,'modelo_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preco'); ?>
		<?php echo $form->textField($model,'preco',array('size'=>10,'maxlength'=>10)); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'excluido'); ?>
		<?php echo $form->textField($model,'excluido'); ?>
		<?php echo $form->error($model,'excluido'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->