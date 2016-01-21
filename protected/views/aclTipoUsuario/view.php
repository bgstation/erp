<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Tipos de Usuários' => Yii::app()->createUrl('aclTipoUsuario/admin'),
        $model->titulo,
    ),
));
?>

<h1>Tipo de Usuário: <?= $model->titulo ?></h1>

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
        array(
            'name' => 'data_cadastro',
            'value' => FormatHelper::dataHora($model->data_cadastro),
        ),
    ),
));
?>

<h3><?= Yii::t('site', 'Opções alternativas') ?></h3>
<ul class="nav_alter">
    <?php if (Yii::app()->user->checkAccess('aclTipoUsuario/admin')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('admin') ?>"><?= Yii::t('site', 'Exibir Tipos de Usuários') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('aclTipoUsuario/update')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('update', array('id' => $model->id)) ?>"><?= Yii::t('site', 'Editar Tipos de Usuários') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('aclTipoUsuario/create')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('create') ?>"><?= Yii::t('site', 'Cadastrar Tipos de Usuários') ?></a></li>
    <?php endif; ?>
</ul>