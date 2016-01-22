<?php

class FormatHelper {
    
    public static function valorMonetario($valor) {
        if (empty($valor)) {
            $valor = 0;
        }
        return number_format($valor, 2, ',', '.');
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