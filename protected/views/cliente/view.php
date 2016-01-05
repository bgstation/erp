<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs = array(
    'Clientes' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Cliente', 'url' => array('index')),
    array('label' => 'Create Cliente', 'url' => array('create')),
    array('label' => 'Update Cliente', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Cliente', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Cliente', 'url' => array('admin')),
);
?>

<h1><?php echo $model->nome; ?></h1>

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
        $urlDelete = "'".Yii::app()->createUrl('clienteCarro/delete', array('id' => $clienteCarro->id))."'";
        echo '<ul>';
        echo '<li>Placa: ' . strtoupper($clienteCarro->placa) . '</li>';
        echo '<li>Marca: ' . $oClienteCarro->aMarcaCarro[$clienteCarro->marca_carro_id] . '</li>';
        echo '<li>Observação: ' . $clienteCarro->observacao . '</li>';
        echo '<li>';
        echo '<a onclick="removerCarro('.$urlDelete.')" href="javascript:void(0)">Remover</a> - <a href="' . Yii::app()->createUrl('clienteCarro/update', array('id' => $clienteCarro->id, 'clienteId' => $clienteCarro->cliente_id)) . '">Editar</a></li>';
        echo '</ul>';
    }
}
?>

<div class="row buttons">
    <?php echo CHtml::button('Adicionar veículo', array(
        'onclick' => 'location.href="'.Yii::app()->createUrl('clienteCarro/create', array('clienteId' => $model->id)).'";',
    )); ?>
</div>

<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/cliente/view.js"></script>

<!--<//?= ClienteCarroHelper::renderCarrosCliente($oClienteCarros) ?>-->
