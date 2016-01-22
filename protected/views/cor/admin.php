<?php
/* @var $this CorController */
/* @var $model Cor */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Cores'
    ),
));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cor-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Cores</h1>

<div class="admin-buttons">
    <?= CHtml::link(($exibeFormularioBusca ? 'Ocultar' : 'Exibir') . ' Filtros', '#', array('class' => 'search_button btn btn-success')) ?>

    <?php
    if (Yii::app()->user->checkAccess('cor/create')) {
        $this->widget('bootstrap.widgets.TbButton', array(
            'type' => 'success',
            'size' => 'medium',
            'label' => 'Cadastrar',
            'url' => Yii::app()->createUrl('cor/create'),
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
    'id' => 'cor-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'titulo',
        'rgb',
        array(
            'name' => 'excluido',
            'value' => '$data->excluido? \'Sim\' : \'Não\''
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{delete}',
            'buttons' => array(
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("cor/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("cor/update")',
                ),
                'delete' => array(
                    'visible' => 'Yii::app()->user->checkAccess("cor/delete")',
                ),
            ),
        ),
    ),
));
?>
<script type="text/javascript" src="<?= Yii::app()->request->baseUrl ?>/js/site.js"></script>