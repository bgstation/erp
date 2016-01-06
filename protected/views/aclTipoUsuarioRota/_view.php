<?php
/* @var $this AclTipoUsuarioRotaController */
/* @var $data AclTipoUsuarioRota */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acl_rota_id')); ?>:</b>
	<?php echo CHtml::encode($data->acl_rota_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('acl_tipo_usuario_id')); ?>:</b>
	<?php echo CHtml::encode($data->acl_tipo_usuario_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('excluido')); ?>:</b>
	<?php echo CHtml::encode($data->excluido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_insercao')); ?>:</b>
	<?php echo CHtml::encode($data->data_insercao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_ultima_atualizacao')); ?>:</b>
	<?php echo CHtml::encode($data->data_ultima_atualizacao); ?>
	<br />


</div>