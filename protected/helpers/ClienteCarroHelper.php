<?php

class ClienteCarroHelper {
    
    public static function renderCarrosCliente($oClienteCarros){
        $return = '';
        
        if(!empty($oClienteCarros)){
            foreach ($oClienteCarros as $clienteCarro){
                $return .= 'Placa: '. strtoupper($clienteCarro->placa);
            }
        }
        
        return $return;
    }
    
}