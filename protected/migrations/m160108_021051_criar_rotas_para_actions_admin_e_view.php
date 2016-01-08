<?php

class m160108_021051_criar_rotas_para_actions_admin_e_view extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'cliente',
            'action' => 'admin',
            'titulo' => 'Visualizar',
            'categoria' => 'cliente',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'cliente',
            'action' => 'view',
            'titulo' => 'Detalhes',
            'categoria' => 'cliente',
        ));
        
        $this->insert('acl_rotas', array(
            'controller' => 'marca',
            'action' => 'admin',
            'titulo' => 'Visualizar',
            'categoria' => 'marca',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'marca',
            'action' => 'view',
            'titulo' => 'Detalhes',
            'categoria' => 'marca',
        ));
        
        $this->insert('acl_rotas', array(
            'controller' => 'modelo',
            'action' => 'admin',
            'titulo' => 'Visualizar',
            'categoria' => 'modelo',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'modelo',
            'action' => 'view',
            'titulo' => 'detalhes',
            'categoria' => 'modelo',
        ));
        
        $this->insert('acl_rotas', array(
            'controller' => 'produto',
            'action' => 'admin',
            'titulo' => 'Visualizar',
            'categoria' => 'produto',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'produto',
            'action' => 'view',
            'titulo' => 'Detalhes',
            'categoria' => 'produto',
        ));
        
        $this->insert('acl_rotas', array(
            'controller' => 'servico',
            'action' => 'admin',
            'titulo' => 'Visualizar',
            'categoria' => 'serviço',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'servico',
            'action' => 'view',
            'titulo' => 'Detalhes',
            'categoria' => 'serviço',
        ));
        
        $this->insert('acl_rotas', array(
            'controller' => 'aclTipoUsuario',
            'action' => 'admin',
            'titulo' => 'Visualizar',
            'categoria' => 'Tipo de usuário',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'aclTipoUsuario',
            'action' => 'view',
            'titulo' => 'Detalhes',
            'categoria' => 'Tipo de usuário',
        ));
        
        $this->insert('acl_rotas', array(
            'controller' => 'usuario',
            'action' => 'admin',
            'titulo' => 'Visualizar',
            'categoria' => 'usuário',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'usuario',
            'action' => 'view',
            'titulo' => 'Detalhes',
            'categoria' => 'usuário',
        ));
    }

    public function safeDown() {
        echo "m160108_021051_criar_rotas_para_actions_admin_e_view does not support migration down.\n";
        return false;
    }

}
