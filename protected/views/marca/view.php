<?php
/* @var $this MarcaController */
/* @var $model Marca */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Marcas' => Yii::app()->createUrl('marca/admin'),
        $model->titulo
    ),
));
?>

<h3>Marca: <?php echo $model->titulo; ?></h3>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'titulo',
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
    <li><a class="btn" href="<?= $this->createUrl('admin') ?>"><?= Yii::t('site', 'Exibir marcas') ?></a></li>
    <li><a class="btn" href="<?= $this->createUrl('update', array('id' => $model->id)) ?>"><?= Yii::t('site', 'Editar marca') ?></a></li>
    <li><a class="btn" href="<?= $this->createUrl('create') ?>"><?= Yii::t('site', 'Cadastrar marca') ?></a></li>
</ul>
