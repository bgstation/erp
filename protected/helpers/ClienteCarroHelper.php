<?php

class ClienteCarroHelper {

    public static function renderCarrosCliente($oClienteCarros) {
        $return = '';

        if (!empty($oClienteCarros)) {
            foreach ($oClienteCarros as $clienteCarro) {
                $urlDelete = "'" . Yii::app()->createUrl('clienteCarro/delete', array('id' => $clienteCarro->id)) . "'";
                $return .= '<ul>';
                $return .= '<li>Placa: ' . strtoupper($clienteCarro->placa) . '</li>';
                if (!empty($clienteCarro->marca_id))
                    $return .= '<li>Marca: ' . $clienteCarro->marca->titulo . '</li>';
                if (!empty($clienteCarro->modelo_id))
                    $return .= '<li>Modelo: ' . $clienteCarro->modelo->titulo . '</li>';
                $return .= '<li>Observação: ' . $clienteCarro->observacao . '</li>';
                $return .= '<li>';
                $return .= '<a onclick="removerCarro(' . $urlDelete . ')" href="javascript:void(0)">Remover</a> - <a href="' . Yii::app()->createUrl('clienteCarro/update', array('id' => $clienteCarro->id, 'clienteId' => $clienteCarro->cliente_id)) . '">Editar</a></li>';
                $return .= '</ul>';
            }
        } else {
            $return = '<h4>Nenhum carro cadastrado.</h4>';
        }

        return $return;
    }

}
