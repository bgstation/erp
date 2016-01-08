<?php

class m160108_170904_inserir_permissoes_do_crud_servicos extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'servico',
            'action' => 'create',
            'titulo' => 'Adicionar',
            'categoria' => 'serviço',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'servico',
            'action' => 'update',
            'titulo' => 'Atualizar',
            'categoria' => 'serviço',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'servico',
            'action' => 'delete',
            'titulo' => 'Remover',
            'categoria' => 'serviço',
        ));
    }

    public function down() {
        echo "m160108_170904_inserir_permissoes_do_crud_servicos does not support migration down.\n";
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
