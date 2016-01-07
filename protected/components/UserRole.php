<?php

class UserRole extends CPhpAuthManager {

    /**
     * Carrega a hierarquia de roles
     */
    public function init() {
        $return = parent::init();

        $oRoleTypeProjeto = RoleTypeProjeto::model()->find(array(
            'join' => 'join usuarios_role_types_projetos as u ON (u.role_type_projeto_id = t.id)',
            'condition' => 'u.usuario_id=' . Yii::app()->user->getId() . ' AND projeto_id=' . Yii::app()->params['projeto_id'],
        ));

        $role = $this->createRole($oRoleTypeProjeto->role_type->titulo);

        if (empty($_SESSION[base64_encode(Yii::app()->params['projeto_id'] . '_PermissoesFuncao')][base64_encode('PermissoesAcessoUsuario')])) {
            $_aPermissoes = Yii::app()->user->getState('__' . base64_encode(Yii::app()->params['projeto_id'] . '_PermissoesAcessoUsuario'));
            if(!empty($_aPermissoes)) {
                $aPermissoes = $_aPermissoes[base64_encode(Yii::app()->params['projeto_id'] . '_PermissoesFuncao')][base64_encode('PermissoesAcessoUsuario')];
            }
        } else {
            $aPermissoes = $_SESSION[base64_encode(Yii::app()->params['projeto_id'] . '_PermissoesFuncao')][base64_encode('PermissoesAcessoUsuario')];
        }
        if ($oRoleTypeProjeto->role_type->titulo == 'Didatico') {
            $this->createOperation('roleDidatico');
            $role->addChild('roleDidatico');
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
