<?php

class m160108_170300_inserir_permissoes_do_crud_cores extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'cor',
            'action' => 'create',
            'titulo' => 'Adicionar',
            'categoria' => 'cor',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'cor',
            'action' => 'update',
            'titulo' => 'Atualizar',
            'categoria' => 'cor',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'cor',
            'action' => 'delete',
            'titulo' => 'Remover',
            'categoria' => 'cor',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'cor',
            'action' => 'admin',
            'titulo' => 'Visualizar',
            'categoria' => 'cor',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'cor',
            'action' => 'view',
            'titulo' => 'Detalhes',
            'categoria' => 'cor',
        ));
    }

    public function down() {
        echo "m160108_170300_inserir_permissoes_do_crud_cores does not support migration down.\n";
        return false;
    }

    /*
      // Use safeUp/safeDown to do migration with transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
