<?php
/* @var $this CompraController */
/* @var $model Compra */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Compras' => Yii::app()->createUrl('compra/admin'),
        $model->id,
    ),
));
?>

<h1>Compra: <?= $model->id ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'nota_fiscal',
        array(
            'name' => 'produto_id',
            'value' => $model->produto->titulo,
        ),
        'preco',
        'observacao',
        'quantidade',
        array(
            'name' => 'data_hora',
            'value' => FormatHelper::dataHora($model->data_hora),
        ),
        array(
            'name' => 'usuario_id',
            'value' => $model->usuario->nome,
        ),
        array(
            'name' => 'excluido',
            'value' => $model->excluido == 0 ? 'Não' : 'Sim',
        ),
    ),
));
?>

<h3><?= Yii::t('site', 'Opções alternativas') ?></h3>
<ul class="nav_alter">
    <?php if (Yii::app()->user->checkAccess('compra/admin')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('admin') ?>"><?= Yii::t('site', 'Exibir Compras') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('compra/update')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('update', array('id' => $model->id)) ?>"><?= Yii::t('site', 'Editar Compra') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('compra/create')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('create') ?>"><?= Yii::t('site', 'Cadastrar Compra') ?></a></li>
    <?php endif; ?>
</ul>
