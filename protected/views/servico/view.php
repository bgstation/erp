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

<h1><?php echo $model->titulo; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'titulo',
        array(
            'name' => 'preco',
            'value' => !empty($model->preco) ? number_format($model->preco, 2, ',', '.') : '',
        ),
        'observacao',
    ),
));
?>

<h3><?= Yii::t('site', 'Opções alternativas') ?></h3>
<ul class="nav_alter">
    <li><a class="btn" href="<?= $this->createUrl('admin') ?>"><?= Yii::t('site', 'Exibir serviços') ?></a></li>
    <li><a class="btn" href="<?= $this->createUrl('update', array('id' => $model->id)) ?>"><?= Yii::t('site', 'Editar serviço') ?></a></li>
    <li><a class="btn" href="<?= $this->createUrl('create') ?>"><?= Yii::t('site', 'Cadastrar serviço') ?></a></li>
</ul>

