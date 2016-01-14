<?php
/* @var $this TipoDespesaController */
/* @var $model TipoDespesa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Tipos de despesa' => Yii::app()->createUrl('tipoDespesa/admin'),
        $model->titulo
    ),
));
?>

<h1>Tipo de despesa: <?php echo $model->titulo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'titulo',
	),
)); ?>

<h3><?= Yii::t('site', 'Opções alternativas') ?></h3>
<ul class="nav_alter">
    <?php if (Yii::app()->user->checkAccess('tipoDespesa/admin')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('admin') ?>"><?= Yii::t('site', 'Exibir tipos de despesa') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('tipoDespesa/update')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('update', array('id' => $model->id)) ?>"><?= Yii::t('site', 'Editar') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('tipoDespesa/create')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('create') ?>"><?= Yii::t('site', 'Cadastrar tipos de despesa') ?></a></li>
    <?php endif; ?>
</ul>
