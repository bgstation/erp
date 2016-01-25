<?php

class FinanceiroForm extends CFormModel {

    public function getHeadersRelatorio() {
        $headers = array(
            'tipo_item',
            'tipo_item_id',
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
