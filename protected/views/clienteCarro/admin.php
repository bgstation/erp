<?php
/* @var $this ClienteCarroController */
/* @var $model ClienteCarro */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Carros'
    ),
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cliente-carro-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Carros</h1>

<div class="admin-buttons">
    <?= CHtml::link(($exibeFormularioBusca ? 'Ocultar' : 'Exibir') . ' Filtros', '#', array('class' => 'search_button btn btn-success')) ?>
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
    'id' => 'cliente-carro-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'placa',
        'observacao',
        array(
            'name' => 'excluido',
            'value' => '$data->excluido? \'Sim\' : \'Não\''
        ),
    ),
));
?>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/site.js"></script>