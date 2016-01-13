<?php
/* @var $this DespesaController */
/* @var $data Despesa */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_despesas_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_despesas_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preco')); ?>:</b>
	<?php echo CHtml::encode($data->preco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacao')); ?>:</b>
	<?php echo CHtml::encode($data->observacao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantidade')); ?>:</b>
	<?php echo CHtml::encode($data->quantidade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data_hora')); ?>:</b>
	<?php echo CHtml::encode($data->data_hora); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('excluido')); ?>:</b>
	<?php echo CHtml::encode($data->excluido); ?>
	<br />

	*/ ?>

</div>