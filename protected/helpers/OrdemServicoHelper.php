<?php

class OrdemServicoHelper {

    public static function getHtml($obj, $remover = true) {
        $return = '';
        $return .= '<tr identificador="' . $obj->tipoItem . '_' . $obj->identificador . '">';
        $return .= '<td>';
        $return .= $obj->titulo;
        $return .= '</td>';
        $return .= '<td>';
        $return .= 'R$' . number_format($obj->preco, 2, ',', '.');
        $return .= '</td>';
        if ($remover) {
            $return .= '<td>';
            $return .= '<a href="javascript:void(0)" class="remove" onclick="removerItem(' . $obj->tipoItem . ', ' . $obj->item_id . ', ' . $obj->identificador . ', ' . $obj->preco . ')">';
            $return .= '<i class="fa fa-times"></i>';
            $return .= '</a>';
            $return .= '</td>';
        }
        $return .= '</tr>';
        return $return;
    }

    public static function renderItens($tipoItem, $oOrdemServicoItens, $remover = true) {
        $return = '';

        if (!empty($oOrdemServicoItens)) {
            $identificador = 1400;
            foreach ($oOrdemServicoItens as $model) {
                $oLogItemNaoCadastrado = LogItemNaoCadastrado::model()->findByAttributes(array(
                    'ordem_servico_item_id' => $model->id,
                ));
                $obj = new stdClass();
                $obj->tipoItem = $tipoItem;
                $obj->identificador = $identificador;
                if ($tipoItem == 1 && $model->tipo_item_id == 1) {
                    if ($model->item_id != 0) {
                        $obj->titulo = $model->produto->titulo;
                        $obj->preco = $model->produto->preco;
                        $obj->item_id = $model->item_id;
                        $return .= self::getHtml($obj, $remover);
                    } else {
                        $obj->titulo = $oLogItemNaoCadastrado->titulo;
                        $obj->preco = $oLogItemNaoCadastrado->preco;
                        $obj->item_id = $identificador;
                        $return .= self::getHtml($obj, $remover);
                    }
                }
                if ($tipoItem == 2 && $model->tipo_item_id == 2) {
                    if ($model->item_id != 0) {
                        $obj->titulo = $model->servico->titulo;
                        $obj->preco = $model->servico->preco;
                        $obj->item_id = $model->item_id;
                        $return .= self::getHtml($obj, $remover);
                    } else {
                        $obj->titulo = $oLogItemNaoCadastrado->titulo;
                        $obj->preco = $oLogItemNaoCadastrado->preco;
                        $obj->item_id = $identificador;
                        $return .= self::getHtml($obj, $remover);
                    }
                }



                $identificador++;
            }
        }

        return $return;
    }

}
