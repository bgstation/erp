<?php
/* @var $this ProdutoController */
/* @var $model Produto */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Produtos'
    ),
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#produto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Produtos</h1>

<div class="admin-buttons">
    <?= CHtml::link(($exibeFormularioBusca ? 'Ocultar' : 'Exibir') . ' Filtros', '#', array('class' => 'search_button btn btn-success')) ?>

    <?php
    if (Yii::app()->user->checkAccess('produto/create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'success',
            'size' => 'medium',
            'label' => 'Cadastrar',
            'url' => Yii::app()->createUrl('produto/create'),
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
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'produto-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'titulo',
        array(
            'name' => 'marca_id',
            'value' => '!empty($data->marca_id) ? $data->marca->titulo : ""'
        ),
        array(
            'name' => 'tipo_produto_id',
            'value' => '!empty($data->tipo_produto_id) ? $data->tipoProduto->titulo : ""',
        ),
        array(
            'name' => 'preco',
            'value' => '!empty($data->preco) ? "R$ ". FormatHelper::valorMonetario($data->preco) : ""'
        ),
        'quantidade',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{retirada}{view}{update}{delete}',
            'buttons' => array(
                'retirada' => array(
                    'label' => '<i class="fa fa-minus-circle"></i>',
                    'options' => array('title' => 'Retirar produto', 'style' => 'margin:0 5px 0 0;color:#313131;'),
                    'url' => 'Yii::app()->createUrl("produto/retirar", array("id" => $data->id))',
                    'visible' => 'Yii::app()->user->checkAccess("produto/retirar")',
                ),
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("produto/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("produto/update")',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("produto/delete")',
                ),
            ),
        ),
    ),
));
?>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/site.js"></script>