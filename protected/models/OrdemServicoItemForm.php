<?php

class OrdemServicoItemForm extends CFormModel {

    public function getHeadersRelatorio() {
        $headers = array(
            'ordem_servico_id',
            'titulo_tipo_item',
            'preco',
            'datahora_insercao',
        );
        return $headers;
    }

}
