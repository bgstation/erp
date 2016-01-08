<?php

class RPFormat {
    
    public static function valorMonetario($valor) {
        if (empty($valor)) {
            return $valor;
        }
        return number_format($valor, 2, ',', '.');
    }
    
    public static function tratarValorMonetario($valor) {
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
        return $valor;
    }
    
    public static function data($valor) {
        if (empty($valor)) {
            return $valor;
        }
        return date('d/m/Y', strtotime($valor));
    }
    
    public static function dataHora($valor) {
        if (empty($valor)) {
            return $valor;
        }
        return date('d/m/Y H:i:s', strtotime($valor));
    }
    
}