<?php

class FinanceiroForm extends CFormModel {

    public function getHeadersRelatorio() {
        $headers = array(
            'titulo_tipo_item',
            'titulo_tipo_item_id',
            'status',
            'descricao',
            'valor',
            'parcelas',
            'usuario',
            'datahora',
        );
        return $headers;
    }

}
