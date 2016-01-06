<?php
/* @var $this AclTipoUsuarioRotaController */
/* @var $model AclTipoUsuarioRota */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'acl_rota_id'); ?>
		<?php echo $form->textField($model,'acl_rota_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'acl_tipo_usuario_id'); ?>
		<?php echo $form->textField($model,'acl_tipo_usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'excluido'); ?>
		<?php echo $form->textField($model,'excluido'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_insercao'); ?>
		<?php echo $form->textField($model,'data_insercao'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data_ultima_atualizacao'); ?>
		<?php echo $form->textField($model,'data_ultima_atualizacao'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->