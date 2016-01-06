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
        'sexo',
        'telefone_fixo',
        'celular',
        'endereco',
        'numero',
        'complemento',
        'data_cadastro',
    ),
));
?>

<hr>

<h3>Carros cadastrados:</h3>

<?php
if (!empty($model->clientesCarros)) {
    foreach ($model->clientesCarros as $clienteCarro) {
        $urlDelete = "'" . Yii::app()->createUrl('clienteCarro/delete', array('id' => $clienteCarro->id)) . "'";
        echo '<ul>';
        echo '<li>Placa: ' . strtoupper($clienteCarro->placa) . '</li>';
        echo '<li>Marca: ' . $oClienteCarro->aMarcaCarro[$clienteCarro->marca_carro_id] . '</li>';
        echo '<li>Observação: ' . $clienteCarro->observacao . '</li>';
        echo '<li>';
        echo '<a onclick="removerCarro(' . $urlDelete . ')" href="javascript:void(0)">Remover</a> - <a href="' . Yii::app()->createUrl('clienteCarro/update', array('id' => $clienteCarro->id, 'clienteId' => $clienteCarro->cliente_id)) . '">Editar</a></li>';
        echo '</ul>';
    }
}
?>

<div class="row buttons">
    <?php
    echo CHtml::button('Adicionar veículo', array(
        'onclick' => 'location.href="' . Yii::app()->createUrl('clienteCarro/create', array('clienteId' => $model->id)) . '";',
    ));
    ?>
</div>

<h3><?= Yii::t('site', 'Opções alternativas') ?></h3>
<ul class="nav_alter">
    <li><a class="btn" href="<?= $this->createUrl('admin') ?>"><?= Yii::t('site', 'Exibir Clientes') ?></a></li>
    <li><a class="btn" href="<?= $this->createUrl('update', array('id' => $model->id)) ?>"><?= Yii::t('site', 'Editar Cliente') ?></a></li>
    <li><a class="btn" href="<?= $this->createUrl('create') ?>"><?= Yii::t('site', 'Cadastrar Cliente') ?></a></li>
</ul>

<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/cliente/view.js"></script>
