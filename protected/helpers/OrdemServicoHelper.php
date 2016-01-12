<?php

class OrdemServicoHelper {

    public static function renderItens($tipoItem, $oOrdemServicoItens) {
        $return = '';

        if (!empty($oOrdemServicoItens)) {
            $identificador = 1400;
            foreach ($oOrdemServicoItens as $model) {
                if ($tipoItem == 1 && $model->tipo_item_id == 1) {
                    $return .= '<tr identificador="' . $tipoItem . '_' . $identificador . '">';
                    $return .= '<td>';
                    $return .= $model->produto->titulo;
                    $return .= '</td>';
                    $return .= '<td>';
                    $return .= 'R$' . number_format($model->produto->preco, 2, ',', '.');
                    $return .= '</td>';
                    $return .= '<td>';
                    $return .= '<a href="javascript:void(0)" class="remove" onclick="removerItem(' . $tipoItem . ', ' . $model->item_id . ', ' . $identificador . ', ' . $model->produto->preco . ')">';
                    $return .= '<i class="fa fa-times"></i>';
                    $return .= '</a>';
                    $return .= '</td>';
                    $return .= '</tr>';
                }
                if ($tipoItem == 2 && $model->tipo_item_id == 2) {
                    $return .= '<tr identificador="' . $tipoItem . '_' . $identificador . '">';
                    $return .= '<td>';
                    $return .= $model->servico->titulo;
                    $return .= '</td>';
                    $return .= '<td>';
                    $return .= 'R$' . number_format($model->servico->preco, 2, ',', '.');
                    $return .= '</td>';
                    $return .= '<td>';
                    $return .= '<a href="javascript:void(0)" class="remove" onclick="removerItem(' . $tipoItem . ', ' . $model->item_id . ', ' . $identificador . ', ' . $model->servico->preco . ')">';
                    $return .= '<i class="fa fa-times"></i>';
                    $return .= '</a>';
                    $return .= '</td>';
                    $return .= '</tr>';
                }
                $identificador++;
            }
        }

        return $return;
    }

}
