<?php

class m160108_113511_inserir_permissoes extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'produto',
            'action' => 'create',
            'titulo' => 'Adicionar',
            'categoria' => 'produto',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'produto',
            'action' => 'update',
            'titulo' => 'Atualizar',
            'categoria' => 'produto',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'produto',
            'action' => 'delete',
            'titulo' => 'Remover',
            'categoria' => 'produto',
        ));
        $oAclRotaPai = AclRota::model()->naoExcluido()->findByAttributes(array(
            'controller' => 'produto',
            'action' => 'create',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'modelo',
            'action' => 'getDataJson',
            'titulo' => '',
            'categoria' => 'produto',
            'exibir' => false,
            'acl_rota_id' => $oAclRotaPai->id,
        ));
    }

    public function down() {
        echo "m160108_113511_inserir_permissoes does not support migration down.\n";
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
