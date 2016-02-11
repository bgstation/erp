<?php
/* @var $this OrdemServicoItemController */
/* @var $data OrdemServicoItem */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ordem_servico_id')); ?>:</b>
	<?php echo CHtml::encode($data->ordem_servico_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_item_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_item_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_id')); ?>:</b>
	<?php echo CHtml::encode($data->item_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacao')); ?>:</b>
	<?php echo CHtml::encode($data->observacao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('excluido')); ?>:</b>
	<?php echo CHtml::encode($data->excluido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preco')); ?>:</b>
	<?php echo CHtml::encode($data->preco); ?>
	<br />


</div>