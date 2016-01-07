<?php

class UserRole extends CPhpAuthManager {

    /**
     * Carrega a hierarquia de roles
     */
    public function init() {
        $return = parent::init();

        $oUsuario = Usuario::model()->findByPk(Yii::app()->user->getId());

        $role = $this->createRole($oUsuario->acl_tipo_usuario->titulo);

        if (empty($_SESSION[base64_encode(Yii::app()->params['projeto'] . '_PermissoesAcesso')][base64_encode('PermissoesAcessoUsuario')])) {
            $_aPermissoes = Yii::app()->user->getState('__' . base64_encode(Yii::app()->params['projeto'] . '_PermissoesAcessoUsuario'));
            if(!empty($_aPermissoes)) {
                $aPermissoes = $_aPermissoes[base64_encode(Yii::app()->params['projeto'] . '_PermissoesAcesso')][base64_encode('PermissoesAcessoUsuario')];
            }
        } else {
            $aPermissoes = $_SESSION[base64_encode(Yii::app()->params['projeto'] . '_PermissoesAcesso')][base64_encode('PermissoesAcessoUsuario')];
        }

        $this->createOperation('site/logout');
        $role->addChild('site/logout');
        $this->createOperation('site/index');
        $role->addChild('site/index');
        $this->createOperation('site/semPermissao');
        $role->addChild('site/semPermissao');

        if (!empty($aPermissoes)) {
            foreach ($aPermissoes as $controller => $actions) {
                foreach ($actions[base64_encode('actions')] as $action) {
                    $dController = base64_decode($controller);
                    $dAction = base64_decode($action);
                    $this->createOperation($dController . '/' . $dAction);
                    $role->addChild($dController . '/' . $dAction);
                }
            }
        }
        return $return;
    }

}
