<?php

class m160114_121303_inserir_novas_permissoes_crud_tipos_de_produto extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'tipoProduto',
            'action' => 'create',
            'titulo' => 'Adicionar',
            'categoria' => 'Tipo de produto',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'tipoProduto',
            'action' => 'update',
            'titulo' => 'Modificar',
            'categoria' => 'Tipo de produto',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'tipoProduto',
            'action' => 'delete',
            'titulo' => 'Deletar',
            'categoria' => 'Tipo de produto',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'tipoProduto',
            'action' => 'admin',
            'titulo' => 'Visualizar',
            'categoria' => 'Tipo de produto',
        ));
        $oAclRotaPai = AclRota::model()->naoExcluido()->findByAttributes(array(
            'controller' => 'tipoProduto',
            'action' => 'admin',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'tipoProduto',
            'action' => 'view',
            'titulo' => 'Visualizar',
            'categoria' => 'Tipo de produto',
            'exibir' => false,
            'acl_rota_id' => $oAclRotaPai->id,
        ));
    }

    public function down() {
        echo "m160114_121303_inserir_novas_permissoes_crud_tipos_de_produto does not support migration down.\n";
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
