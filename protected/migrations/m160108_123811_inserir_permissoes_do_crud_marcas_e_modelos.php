<?php

class m160108_123811_inserir_permissoes_do_crud_marcas_e_modelos extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'marca',
            'action' => 'create',
            'titulo' => 'Adicionar',
            'categoria' => 'marca',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'marca',
            'action' => 'update',
            'titulo' => 'Atualizar',
            'categoria' => 'marca',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'marca',
            'action' => 'delete',
            'titulo' => 'Remover',
            'categoria' => 'marca',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'modelo',
            'action' => 'create',
            'titulo' => 'Adicionar',
            'categoria' => 'modelo',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'modelo',
            'action' => 'update',
            'titulo' => 'Atualizar',
            'categoria' => 'modelo',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'modelo',
            'action' => 'delete',
            'titulo' => 'Remover',
            'categoria' => 'modelo',
        ));
    }

    public function down() {
        echo "m160108_123811_inserir_permissoes_do_crud_marcas_e_modelos does not support migration down.\n";
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
