<?php
/* @var $this FinanceiroController */
/* @var $data Financeiro */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_item')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_item); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_item_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_item_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parcelas')); ?>:</b>
	<?php echo CHtml::encode($data->parcelas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('data_hora')); ?>:</b>
	<?php echo CHtml::encode($data->data_hora); ?>
	<br />

	*/ ?>

</div>