<?php

class OrdemServicoHelper {

    public static function renderItens($tipoItem, $oOrdemServicoItens) {
        $return = '';

        if (!empty($oOrdemServicoItens)) {
            $identificador = 1400;
            foreach ($oOrdemServicoItens as $model) {
                if ($tipoItem == 1) {
                    $return .= '<tr identificador="produto_' . $identificador . '">';
                    $return .= '<td>';
                    $return .= $model->produto->titulo;
                    $return .= '</td>';
                    $return .= '<td>';
                    $return .= 'R$' . number_format($model->produto->preco, 2, ',', '.');
                    $return .= '</td>';
                    $return .= '<td>';
                    $return .= '<a href="javascript:void(0)" class="remove" onclick="removerServico(' . $tipoItem . ', ' . $model->item_id . ', ' . $identificador . ')">';
                    $return .= '<i class="fa fa-times"></i>';
                    $return .= '</a>';
                    $return .= '</td>';
                    $return .= '</tr>';
                }
                $identificador++;
            }
        } else {
            $return = '<h4>Nenhum carro cadastrado.</h4>';
        }

        return $return;
    }

}
