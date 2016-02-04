<?php

class Email {
    
    public $destinatarios;
    public $assunto;
    public $mensagem;
    public $reply_to = 'atendimento@didaticotecnologia.com.br';
    public $return_path = 'webmaster@didaticotecnologia.com.br';
    public $from_email = 'atendimento@didaticotecnologia.com.br';
    public $from_nome = 'Atendimento';
    public $copia = NULL;
    public $copia_oculta = NULL;
    
    public function getHeaders() {
        $headers = "MIME-Version: 1.1\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "X-Priority: 3\n";
        $headers .= "From: " . $this->from_nome . " <" . $this->from_email . ">\r\n";
        $headers .= "Reply-To: " . $this->reply_to . "\r\n";
        $headers .= "Return-Path: " . $this->return_path . "\r\n";
        if (!empty($this->copia)) {
            $headers .= "Cc: " . $this->copia . "\r\n";
        }
        if (!empty($this->copia_oculta)) {
            $headers .= "Bcc: " . $this->copia_oculta . "\r\n";
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