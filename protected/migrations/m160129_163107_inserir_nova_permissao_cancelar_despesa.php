<?php

class m160129_163107_inserir_nova_permissao_cancelar_despesa extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'despesa',
            'action' => 'cancelar',
            'titulo' => 'Cancelar',
            'categoria' => 'Despesas',
        ));
    }

    public function down() {
        echo "m160129_163107_inserir_nova_permissao_cancelar_despesa does not support migration down.\n";
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
