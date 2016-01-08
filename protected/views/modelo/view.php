<?php
/* @var $this ModeloController */
/* @var $model Modelo */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Modelos' => Yii::app()->createUrl('modelo/admin'),
        $model->titulo
    ),
));
?>

<h3>Modelo: <?php echo $model->titulo ?></h3>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'titulo',
        array(
            'name' => 'marca_id',
            'value' => !empty($model->marca_id) ? $model->marca->titulo : '',
        ),
        'observacao',
        array(
            'name' => 'excluido',
            'value' => $model->excluido == 0 ? 'Não' : 'Sim',
        ),
    ),
));
?>

<h3><?= Yii::t('site', 'Opções alternativas') ?></h3>
<ul class="nav_alter">
    <?php if (Yii::app()->user->checkAccess('modelo/admin')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('admin') ?>"><?= Yii::t('site', 'Exibir modelos') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('modelo/update')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('update', array('id' => $model->id)) ?>"><?= Yii::t('site', 'Editar modelo') ?></a></li>
    <?php endif; ?>
    <?php if (Yii::app()->user->checkAccess('modelo/create')) : ?>
        <li><a class="btn" href="<?= $this->createUrl('create') ?>"><?= Yii::t('site', 'Cadastrar modelo') ?></a></li>
    <?php endif; ?>
</ul>