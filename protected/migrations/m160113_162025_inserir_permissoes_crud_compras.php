<?php

class m160113_162025_inserir_permissoes_crud_compras extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'compra',
            'action' => 'create',
            'titulo' => 'Adicionar',
            'categoria' => 'Compras',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'compra',
            'action' => 'update',
            'titulo' => 'Modificar',
            'categoria' => 'Compras',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'compra',
            'action' => 'delete',
            'titulo' => 'Deletar',
            'categoria' => 'Compras',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'compra',
            'action' => 'admin',
            'titulo' => 'Visualizar',
            'categoria' => 'Compras',
        ));
        $oAclRotaPai = AclRota::model()->naoExcluido()->findByAttributes(array(
            'controller' => 'compra',
            'action' => 'admin',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'compra',
            'action' => 'view',
            'titulo' => 'Visualizar',
            'categoria' => 'Compras',
            'exibir' => false,
            'acl_rota_id' => $oAclRotaPai->id,
        ));
    }

    public function down() {
        echo "m160113_162025_inserir_permissoes_crud_compras does not support migration down.\n";
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
