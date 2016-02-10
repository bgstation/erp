<?php

class FinanceiroForm extends CFormModel {

    public function getHeadersRelatorio() {
        $headers = array(
            'titulo_tipo_item',
            'descricao',
            'valor',
            'parcelas',
            'usuario',
            'data_hora',
            'titulo_status',
        );
        return $headers;
    }

}
