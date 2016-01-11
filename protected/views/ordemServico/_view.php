<?php
/* @var $this OrdemServicoController */
/* @var $data OrdemServico */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cliente_id')); ?>:</b>
	<?php echo CHtml::encode($data->cliente_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cliente_carro_id')); ?>:</b>
	<?php echo CHtml::encode($data->cliente_carro_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('forma_pagamento_id')); ?>:</b>
	<?php echo CHtml::encode($data->forma_pagamento_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacao')); ?>:</b>
	<?php echo CHtml::encode($data->observacao); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('excluido')); ?>:</b>
	<?php echo CHtml::encode($data->excluido); ?>
	<br />


</div>