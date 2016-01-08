<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Usuários' => Yii::app()->createUrl('usuario/admin'),
        $model->nome,
    ),
));
?>

<h1>Usuario: <?= $model->nome ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'nome',
        'login',
        array(
            'name' => 'acl_tipo_usuario_id',
            'value' => !empty($model->acl_tipo_usuario_id) ? $model->acl_tipo_usuario->titulo : '',
        ),
        array(
            'name' => 'excluido',
            'value' => $model->excluido == 0 ? 'Não' : 'Sim',
        ),
        'data_cadastro',
    ),
));
?>

<h3><?= Yii::t('site', 'Opções alternativas') ?></h3>
<ul class="nav_alter">
    <?php if (Yii::app()->user->checkAccess('usuario/admin')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('admin') ?>"><?= Yii::t('site', 'Exibir Usuários') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('usuario/update')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('update', array('id' => $model->id)) ?>"><?= Yii::t('site', 'Editar Usuário') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('usuario/create')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('create') ?>"><?= Yii::t('site', 'Cadastrar Usuário') ?></a></li>
    <?php endif; ?>
</ul>
