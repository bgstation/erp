<?php

class OrdemServicoItemForm extends CFormModel {

    public function getHeadersRelatorio() {
        $headers = array(
            'ordem_servico_id',
            'preco',
            'datahora_insercao',
        );
        return $headers;
    }

}
