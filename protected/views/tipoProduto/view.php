<?php
/* @var $this TipoProdutoController */
/* @var $model TipoProduto */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Tipo de Produto' => Yii::app()->createUrl('tipoProduto/admin'),
        $model->titulo
    ),
));
?>

<h1>Tipo de Produto: <?= $model->titulo ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'titulo',
        array(
            'name' => 'excluido',
            'value' => $model->excluido == 0 ? 'Não' : 'Sim',
        ),
    ),
));
?>

<h3><?= Yii::t('site', 'Opções alternativas') ?></h3>
<ul class="nav_alter">
    <?php if (Yii::app()->user->checkAccess('tipoProduto/admin')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('admin') ?>"><?= Yii::t('site', 'Exibir tipos de produto') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('tipoProduto/update')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('update', array('id' => $model->id)) ?>"><?= Yii::t('site', 'Editar') ?></a></li>
        <?php endif; ?>
        <?php if (Yii::app()->user->checkAccess('tipoProduto/create')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('create') ?>"><?= Yii::t('site', 'Cadastrar tipo de produto') ?></a></li>
<?php endif; ?>
</ul>