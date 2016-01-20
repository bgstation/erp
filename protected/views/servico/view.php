<?php
/* @var $this ServicoController */
/* @var $model Servico */


$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Serviços' => Yii::app()->createUrl('servico/admin'),
        $model->titulo,
    ),
));
?>

<h1>Serviço: <?= $model->titulo ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'titulo',
        array(
            'name' => 'preco',
            'value' => !empty($model->preco) ? FormatHelper::valorMonetario($model->preco) : '',
        ),
        'observacao',
    ),
));
?>

<h3><?= Yii::t('site', 'Opções alternativas') ?></h3>
<ul class="nav_alter">
    <?php if (Yii::app()->user->checkAccess('servico/admin')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('admin') ?>"><?= Yii::t('site', 'Exibir itens') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('servico/update')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('update', array('id' => $model->id)) ?>"><?= Yii::t('site', 'Editar itens') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('servico/create')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('create') ?>"><?= Yii::t('site', 'Cadastrar itens') ?></a></li>
        <?php endif; ?>
</ul>

