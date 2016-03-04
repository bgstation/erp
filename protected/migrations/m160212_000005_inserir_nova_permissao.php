<?php

class m160212_000005_inserir_nova_permissao extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'financeiro',
            'action' => 'adminFiltrar',
            'titulo' => 'Fitro por data',
            'categoria' => 'Relatórios',
        ));
    }

    public function down() {
        echo "m160212_000005_inserir_nova_permissao does not support migration down.\n";
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
