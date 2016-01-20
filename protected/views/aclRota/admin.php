<?php
/* @var $this AclRotaController */
/* @var $model AclRota */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Rotas',
    ),
));
?>

<h1>Rotas</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'acl-rota-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'controller',
        'action',
        'titulo',
        'descricao',
        array(
            'name' => 'excluido',
            'value' => '$data->excluido? \'Sim\' : \'Não\''
        ),
    ),
));
?>
