<?php

class m160106_125701_inserir_registro_tabela_acl_rotas extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'cliente',
            'action' => 'create',
            'titulo' => 'Adicionar',
            'categoria' => 'cliente',
        ));

        $this->insert('acl_rotas', array(
            'controller' => 'cliente',
            'action' => 'update',
            'titulo' => 'Modificar',
            'categoria' => 'cliente',
        ));

        $this->insert('acl_rotas', array(
            'controller' => 'cliente',
            'action' => 'delete',
            'titulo' => 'Deletar',
            'categoria' => 'cliente',
        ));

        $this->insert('acl_rotas', array(
            'controller' => 'clienteCarro',
            'action' => 'create',
            'titulo' => 'Adicionar carro',
            'categoria' => 'cliente',
        ));
        
        $this->insert('acl_rotas', array(
            'controller' => 'clienteCarro',
            'action' => 'update',
            'titulo' => 'Atualizar carro',
            'categoria' => 'cliente',
        ));
        
        $this->insert('acl_rotas', array(
            'controller' => 'clienteCarro',
            'action' => 'delete',
            'titulo' => 'Deletar carro',
            'categoria' => 'cliente',
        ));
    }

    public function down() {
        echo "m160106_125701_inserir_registro_tabela_acl_rotas does not support migration down.\n";
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
