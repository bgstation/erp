<?php

class m160121_181231_inserir_permissoes extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'logRetiradaProduto',
            'action' => 'view',
            'titulo' => 'Visualizar',
            'categoria' => 'Retirada de produtos',
        ));
        $oAclRotaPai = AclRota::model()->findByAttributes(array(
            'controller' => 'logRetiradaProduto',
            'action' => 'view',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'logRetiradaProduto',
            'action' => 'admin',
            'titulo' => 'Finalizar',
            'categoria' => 'Retirada de produtos',
            'exibir' => false,
            'acl_rota_id' => $oAclRotaPai->id,
        ));
        
        $this->insert('acl_rotas', array(
            'controller' => 'produto',
            'action' => 'retirar',
            'titulo' => 'Retirar',
            'categoria' => 'produto',
        ));
        
        $this->insert('acl_rotas', array(
            'controller' => 'compra',
            'action' => 'cancelar',
            'titulo' => 'Cancelar',
            'categoria' => 'Compras',
        ));
    }

    public function down() {
        echo "m160121_181231_inserir_permissoes does not support migration down.\n";
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
