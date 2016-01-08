<?php

class m160106_143226_inserir_registro_tabela_acl_rotas extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'usuario',
            'action' => 'create',
            'titulo' => 'Adicionar',
            'categoria' => 'usuário',
        ));

        $this->insert('acl_rotas', array(
            'controller' => 'usuario',
            'action' => 'update',
            'titulo' => 'Modificar',
            'categoria' => 'usuário',
        ));

        $this->insert('acl_rotas', array(
            'controller' => 'usuario',
            'action' => 'delete',
            'titulo' => 'Deletar',
            'categoria' => 'usuário',
        ));

        $this->insert('acl_rotas', array(
            'controller' => 'aclTipoUsuario',
            'action' => 'create',
            'titulo' => 'Adicionar',
            'categoria' => 'Tipo de usuário',
        ));

        $this->insert('acl_rotas', array(
            'controller' => 'aclTipoUsuario',
            'action' => 'update',
            'titulo' => 'Modificar',
            'categoria' => 'Tipo de usuário',
        ));

        $this->insert('acl_rotas', array(
            'controller' => 'aclTipoUsuario',
            'action' => 'delete',
            'titulo' => 'Deletar',
            'categoria' => 'Tipo de usuário',
        ));
    }

    public function safeDown() {
        echo "m160106_143226_inserir_registro_tabela_acl_rotas does not support migration down.\n";
        return false;
    }

}
