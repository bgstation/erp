<?php
/* @var $this CompraController */
/* @var $model Compra */

$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
    'homeLink' => '<a href="' . Yii::app()->createUrl('site/index') . '">Home</a>',
    'links' => array(
        'Cadastro' => '',
        'Compras'
    ),
));
?>

<h1>Compras</h1>

<?php
if (Yii::app()->user->checkAccess('compra/create')) {
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'success',
        'size' => 'medium',
        'label' => 'Cadastrar',
        'url' => Yii::app()->createUrl('compra/create'),
        'htmlOptions' => array(
            'class' => 'pull-left',
        ),
            )
    );
}
?>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'compra-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'rowCssClassExpression'=> '$data->getColor($data->excluido)',
    'columns' => array(
        'nota_fiscal',
        array(
            'name' => 'produto_id',
            'value' => '!empty($data->produto_id) ? $data->produto->titulo : ""',
            'filter' => CHtml::activeDropDownList($model, 'produto_id', CHtml::listData($oProdutos, 'id', 'titulo'), array(
                'empty' => '',
            )),
        ),
        array(
            'name' => 'preco',
            'value' => '!empty($data->preco) ? "R$ ". number_format($data->preco, 2, ",", ".") : ""'
        ),
        array(
            'name' => 'quantidade',
            'value' => '$data->quantidade',
            'htmlOptions' => array('width' => '100px'),
        ),
        array(
            'name' => 'data_hora',
            'value' => '!empty($data->data_hora) ? date("d/m/Y H:i:s", strtotime($data->data_hora)) : ""'
        ),
        array(
            'name' => 'excluido',
            'value' => '!empty($data->excluido) && $data->excluido == 1 ? "Cancelada" : "Ativa"'
        ),
//        array(
//            'name' => 'usuario_id',
//            'value' => '!empty($data->usuario_id) ? $data->usuario->nome : ""',
//            'filter' => CHtml::activeDropDownList($model, 'usuario_id', CHtml::listData($oUsuarios, 'id', 'nome'), array(
//                'empty' => '',
//            )),
//        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{view}{update}{cancelar}',
            'buttons' => array(
                'view' => array(
                    'visible' => 'Yii::app()->user->checkAccess("compra/view")',
                ),
                'update' => array(
                    'visible' => 'Yii::app()->user->checkAccess("compra/update")',
                ),
                'cancelar' => array(
                    'label' => '<i class="fa fa-times"></i>',
                    'options' => array(
                        'ajax' => array(
                            'type' => 'GET',
                            'url' => "js:$(this).attr('href')",
                            'beforeSend' => 'function(){
                                    var confirma = confirm("Deseja cancelar esta compra ?");
                                    if (!confirma) {
                                        alert("Nenhuma ação realizada!");
                                        return false;
                                    }
                                }',
                            'success' => 'function(data) {
                                            var obj = $.parseJSON(data);
                                            if(obj.status == "success"){
                                                alert("Compra cancelada com sucesso!");
                                            } else {
                                                alert(obj.errors["quantidade"]);
                                            }
                                        }'
                        ),
                        'title' => 'Cancelar compra', 'style' => 'margin:0 5px 0 0;color:#313131;'
                    ),
                    'url' => 'Yii::app()->createUrl("compra/cancelar", array("id" => $data->id))',
//                    'visible' => 'Yii::app()->user->checkAccess("compra/cancelar") && $data->checaCancelado()',
                ),
            ),
        ),
    ),
));
?>

<script>
//    $.parseJSON()
</script>