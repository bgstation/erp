<?php
/* @var $this LogCaixaController */
/* @var $model LogCaixa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'log-caixa-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Os campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'operacao_id'); ?>
		<?php
                    $this->widget('ext.select2.ESelect2', array(
                        'model' => $model,
                        'attribute' => 'operacao_id',
                        'data' => $model->aOperacoes,
                        'options' => array(
                            'placeholder' => 'Operação',
                            'allowClear' => false,
                        ),
                        'htmlOptions' => array(
                            'id' => 'select2_operacao_id',
                        ),
                    ));
                ?>
		<?php echo $form->error($model,'operacao_id'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'valor'); ?>
		<?php echo $form->textField($model,'valor',array('size'=>10,'maxlength'=>10, 'class' => 'preco')); ?>
		<?php echo $form->error($model,'valor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php echo $form->textField($model,'descricao',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'descricao'); ?>
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
        
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/logCaixa/_form.js"></script>

</div><!-- form -->