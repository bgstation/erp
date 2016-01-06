<?php
/* @var $this AclTipoUsuarioRotaController */
/* @var $model AclTipoUsuarioRota */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'acl-tipo-usuario-rota-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'acl_rota_id'); ?>
		<?php echo $form->textField($model,'acl_rota_id'); ?>
		<?php echo $form->error($model,'acl_rota_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'acl_tipo_usuario_id'); ?>
		<?php echo $form->textField($model,'acl_tipo_usuario_id'); ?>
		<?php echo $form->error($model,'acl_tipo_usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'excluido'); ?>
		<?php echo $form->textField($model,'excluido'); ?>
		<?php echo $form->error($model,'excluido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_insercao'); ?>
		<?php echo $form->textField($model,'data_insercao'); ?>
		<?php echo $form->error($model,'data_insercao'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data_ultima_atualizacao'); ?>
		<?php echo $form->textField($model,'data_ultima_atualizacao'); ?>
		<?php echo $form->error($model,'data_ultima_atualizacao'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->