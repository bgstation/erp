<?php

class RPMail {

    public $from_nome;
    public $from_email;
    public $reply_to;
    public $return_path;
    public $copia;
    public $destinatarios;
    public $assunto;
    public $mensagem;
    
    public function getHeaders() {
        $headers = "MIME-Version: 1.1\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "X-Priority: 3\n";
        $headers .= "From: " . $this->from_nome . " <" . $this->from_email . ">\r\n";
        $headers .= "Reply-To: " . $this->reply_to . "\r\n";
        $headers .= "Return-Path: " . $this->return_path . "\r\n";
        if ($this->copia != NULL) {
            $headers .= "Cc: " . $this->copia . "\r\n";
        }
        return $headers;
    }

    public function enviar() {
        if (!mail($this->destinatarios, $this->assunto, $this->mensagem, $this->getHeaders())) {
            return false;
        }
        return true;
    }

}
