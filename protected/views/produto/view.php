<?php
/* @var $this ProdutoController */
/* @var $model Produto */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Produtos' => Yii::app()->createUrl('produto/admin'),
        $model->titulo
    ),
));
?>

<h1>Produtos: <?= $model->titulo ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'titulo',
        'codigo_barra',
        array(
            'name' => 'tipo_produto_id',
            'value' => !empty($model->tipo_produto_id) ? $model->tipoProduto->titulo : '',
        ),
        array(
            'name' => 'marca_id',
            'value' => !empty($model->marca_id) ? $model->marca->titulo : '',
        ),
        array(
            'name' => 'modelo_id',
            'value' => !empty($model->modelo_id) ? $model->modelo->titulo : '',
        ),
        array(
            'name' => 'preco_variavel',
            'value' => $model->preco_variavel == 0 ? 'Não' : 'Sim',
        ),
        array(
            'name' => 'preco',
            'value' => !empty($model->preco) ? FormatHelper::valorMonetario($model->preco) : '',
        ),
        'observacao',
        'quantidade',
        array(
            'name' => 'excluido',
            'value' => $model->excluido == 0 ? 'Não' : 'Sim',
        ),
    ),
));
?>
<h3><?= Yii::t('site', 'Opções alternativas') ?></h3>
<ul class="nav_alter">
    <?php if (Yii::app()->user->checkAccess('produto/admin')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('admin') ?>"><?= Yii::t('site', 'Exibir produtos') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('produto/update')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('update', array('id' => $model->id)) ?>"><?= Yii::t('site', 'Editar produto') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('produto/create')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('create') ?>"><?= Yii::t('site', 'Cadastrar produto') ?></a></li>
        <?php endif; ?>
</ul>
