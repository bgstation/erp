<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * @var integer
     */
    protected $idUsuario;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        $oUsuario = Usuario::model()->naoExcluido()->findByAttributes(array(
            'login' => $this->username,
            'senha' => md5($this->password),
        ));

        if (!empty($oUsuario)) {
            $this->idUsuario = $oUsuario->id;
            $this->errorCode = self::ERROR_NONE;
        } else {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        }
        return $this->errorCode;
    }

    public function getId() {
        return $this->idUsuario;
    }

}
