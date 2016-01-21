<?php

class SearchForm {

    public $request;

    public function checaRequisicaoVazia() {
        if (empty($this->request)) {
            return false;
        }

        foreach ($this->request as $data) {
            if (!empty($data)) {
                return true;
            }
        }
    }

}
