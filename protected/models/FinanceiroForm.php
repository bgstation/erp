<?php

class FinanceiroForm extends CFormModel {

    public function getHeadersRelatorio() {
        $headers = array(
            'titulo_tipo_item',
            'descricao',
            'status',
            'valor',
            'parcelas',
            'usuario',
            'datahora',
        );
        return $headers;
    }

}
