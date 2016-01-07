<?php
/* @var $this ProdutoController */
/* @var $data Produto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_barra')); ?>:</b>
	<?php echo CHtml::encode($data->codigo_barra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marca_id')); ?>:</b>
	<?php echo CHtml::encode($data->marca_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modelo_id')); ?>:</b>
	<?php echo CHtml::encode($data->modelo_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('preco')); ?>:</b>
	<?php echo CHtml::encode($data->preco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacao')); ?>:</b>
	<?php echo CHtml::encode($data->observacao); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('quantidade')); ?>:</b>
	<?php echo CHtml::encode($data->quantidade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('excluido')); ?>:</b>
	<?php echo CHtml::encode($data->excluido); ?>
	<br />

	*/ ?>

</div>