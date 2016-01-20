<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Clientes' => Yii::app()->createUrl('cliente/admin'),
        $model->nome,
    ),
));
?>

<h1>Cliente: <?= $model->nome ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'email',
        'nome',
        'cpf',
        array(
            'name' => 'sexo',
            'value' => $model->aSexo[$model->sexo],
        ),
        'telefone_fixo',
        'celular',
        'endereco',
        'numero',
        'complemento',
        array(
            'name' => 'data_cadastro',
            'value' => FormatHelper::dataHora($model->data_cadastro),
        ),
    ),
));
?>

<hr>

<h3>Carros cadastrados:</h3>

<?= ClienteCarroHelper::renderCarrosCliente($model->clientesCarros) ?>

<hr>

<h3><?= Yii::t('site', 'Opções alternativas') ?></h3>
<ul class="nav_alter">
    <?php if (Yii::app()->user->checkAccess('cliente/admin')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('admin') ?>"><?= Yii::t('site', 'Exibir Clientes') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('cliente/update')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('update', array('id' => $model->id)) ?>"><?= Yii::t('site', 'Editar Cliente') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('cliente/create')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('create') ?>"><?= Yii::t('site', 'Cadastrar Cliente') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('clienteCarro/create')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('clienteCarro/create', array('clienteId' => $model->id)) ?>"><?= Yii::t('site', 'Cadastrar Carro') ?></a></li>
    <?php endif; ?>
</ul>

<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/cliente/view.js"></script>
