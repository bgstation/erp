<?php
/* @var $this DespesaController */
/* @var $model Despesa */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Despesas' => Yii::app()->createUrl('despesa/admin'),
        $model->id
    ),
));
?>

<h1>Despesa: <?= $model->id ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        array(
            'name' => 'tipoDespesa',
            'value' => !empty($model->tipo_despesa_id) ? $model->tipoDespesa->titulo : '',
        ),
        array(
            'name' => 'preco',
            'value' => !empty($model->preco) ? FormatHelper::valorMonetario($model->preco) : '',
        ),
        'observacao',
        'quantidade',
        array(
            'name' => 'data_hora',
            'value' => !empty($model->data_hora) ? FormatHelper::dataHora($model->data_hora) : '',
        ),
        array(
            'name' => 'usuario_id',
            'value' => !empty($model->usuario_id) ? $model->usuario->nome : '',
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
    <?php if (Yii::app()->user->checkAccess('despesa/admin')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('admin') ?>"><?= Yii::t('site', 'Exibir despesas') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('despesa/update')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('update', array('id' => $model->id)) ?>"><?= Yii::t('site', 'Editar despesa') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('despesa/create')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('create') ?>"><?= Yii::t('site', 'Cadastrar despesa') ?></a></li>
    <?php endif; ?>
</ul>
