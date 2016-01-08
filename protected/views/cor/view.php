<?php
/* @var $this CorController */
/* @var $model Cor */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cores' => Yii::app()->createUrl('cor/admin'),
        $model->titulo,
    ),
));
?>

<h1>Cor: <?php echo $model->titulo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'titulo',
		'rgb',
		'excluido',
	),
)); ?>

<hr>

<h3><?= Yii::t('site', 'Opções alternativas') ?></h3>
<ul class="nav_alter">
    <?php if (Yii::app()->user->checkAccess('cor/admin')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('admin') ?>"><?= Yii::t('site', 'Exibir cores') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('cor/update')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('update', array('id' => $model->id)) ?>"><?= Yii::t('site', 'Editar cor') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('cor/create')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('create') ?>"><?= Yii::t('site', 'Cadastrar cor') ?></a></li>
    <?php endif; ?>
</ul>