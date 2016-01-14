<?php

class m160113_162039_inserir_permissoes_crud_despesas extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'despesa',
            'action' => 'create',
            'titulo' => 'Adicionar',
            'categoria' => 'Despesas',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'despesa',
            'action' => 'update',
            'titulo' => 'Modificar',
            'categoria' => 'Despesas',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'despesa',
            'action' => 'delete',
            'titulo' => 'Deletar',
            'categoria' => 'Despesas',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'despesa',
            'action' => 'admin',
            'titulo' => 'Visualizar',
            'categoria' => 'Despesas',
        ));
        $oAclRotaPai = AclRota::model()->naoExcluido()->findByAttributes(array(
            'controller' => 'despesa',
            'action' => 'admin',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'despesa',
            'action' => 'view',
            'titulo' => 'Visualizar',
            'categoria' => 'Despesas',
            'exibir' => false,
            'acl_rota_id' => $oAclRotaPai->id,
        ));
    }

    public function down() {
        echo "m160113_162039_inserir_permissoes_crud_despesas does not support migration down.\n";
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
