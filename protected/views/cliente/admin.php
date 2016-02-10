<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Clientes'
    ),
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cliente-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Clientes</h1>

<div class="admin-buttons">
    <?= CHtml::link(($exibeFormularioBusca ? 'Ocultar' : 'Exibir') . ' Filtros', '#', array('class' => 'search_button btn btn-success')) ?>

    <?php
    if (Yii::app()->user->checkAccess('cliente/create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'success',
            'size' => 'medium',
            'label' => 'Cadastrar',
            'url' => Yii::app()->createUrl('cliente/create'),
                )
        );
    }
    ?>
    <div class="search_form" style='display:<?= $exibeFormularioBusca ? '' : 'none' ?>;'>
        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>
    </div>
</div>

<?php
$gridView = $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'cliente-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'nome',
        'email',
        'cpf',
        'celular',
        array(
            'name' => 'placa',
            'value' => '$data->placa',
        ),
//        'telefone_fixo',
//        array(
//            'header'  => '',
//            'type'  => 'raw',
//            'value' => '$data->getDropDownGridView()',
//        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{abrirOS}{addCarro}{view}{update}{delete}',
            'buttons' => array(
                'abrirOS' => array(
                    'label' => '<i class="fa fa-file-text-o"></i>',
                    'url' => 'Yii::app()->createUrl("ordemServico/create", array("clienteId" => $data->id))',
                    'visible' => 'Yii::app()->user->checkAccess("ordemServico/create")',
                    'options' => array(
                        'title' => 'Abrir OS', 'style' => 'margin:0 5px 0 0;color:#313131;'
                    ),
                ),
                'addCarro' => array(
                    'label' => '<i class="fa fa-car"></i>',
                    'url' => 'Yii::app()->createUrl("clienteCarro/create", array("clienteId" => $data->id))',
                    'visible' => 'Yii::app()->user->checkAccess("clienteCarro/create")',
                    'options' => array(
                        'title' => 'Cadastrar carro', 'style' => 'margin:0 5px 0 0;color:#313131;'
                    ),
                ),
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("cliente/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("cliente/update")',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("cliente/delete")',
                ),
            ),
        ),
    ),
));
$this->renderExportGridButton($gridView, 'Exportar Relatório', array('class' => 'btn btn-info pull-left'));
?>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/site.js"></script>