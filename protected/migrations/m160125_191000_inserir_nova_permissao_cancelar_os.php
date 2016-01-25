<?php

class m160125_191000_inserir_nova_permissao_cancelar_os extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'ordemServico',
            'action' => 'cancelar',
            'titulo' => 'Cancelar',
            'categoria' => 'Ordem Serviço',
        ));
    }

    public function down() {
        echo "m160125_191000_inserir_nova_permissao_cancelar_os does not support migration down.\n";
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
