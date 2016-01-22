<?php

class m160122_181050_criar_permissao_visualizar_avisos_e_acoes_dashboard extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'dashboard',
            'action' => 'avisos',
            'titulo' => 'Visualizar Avisos',
            'categoria' => 'Dashboard',
        ));
        
        $this->insert('acl_rotas', array(
            'controller' => 'dashboard',
            'action' => 'acoes',
            'titulo' => 'Visualizar Ações',
            'categoria' => 'Dashboard',
        ));
    }

    public function safeDown() {
        echo "m160122_181050_criar_permissao_visualizar_avisos_e_acoes_dashboard does not support migration down.\n";
        return false;
    }

}
