<?php

class m160113_162031_inserir_permissoes_crud_tipo_despesas extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'tipoDespesa',
            'action' => 'create',
            'titulo' => 'Adicionar',
            'categoria' => 'Tipo de despesas',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'tipoDespesa',
            'action' => 'update',
            'titulo' => 'Modificar',
            'categoria' => 'Tipo de despesas',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'tipoDespesa',
            'action' => 'delete',
            'titulo' => 'Deletar',
            'categoria' => 'Tipo de despesas',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'tipoDespesa',
            'action' => 'admin',
            'titulo' => 'Visualizar',
            'categoria' => 'Tipo de despesas',
        ));
        $oAclRotaPai = AclRota::model()->naoExcluido()->findByAttributes(array(
            'controller' => 'tipoDespesa',
            'action' => 'admin',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'tipoDespesa',
            'action' => 'view',
            'titulo' => 'Visualizar',
            'categoria' => 'Tipo de despesas',
            'exibir' => false,
            'acl_rota_id' => $oAclRotaPai->id,
        ));
    }

    public function down() {
        echo "m160113_162031_inserir_permissoes_crud_tipo_despesas does not support migration down.\n";
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
