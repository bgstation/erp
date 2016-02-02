<?php

class m160201_163600_inserir_novas_permissoes_caixas extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'logCaixa',
            'action' => 'create',
            'titulo' => 'Cadastrar',
            'categoria' => 'Caixa',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'logCaixa',
            'action' => 'update',
            'titulo' => 'Atualizar',
            'categoria' => 'Caixa',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'logCaixa',
            'action' => 'delete',
            'titulo' => 'Deletar',
            'categoria' => 'Caixa',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'logCaixa',
            'action' => 'admin',
            'titulo' => 'Visualizar',
            'categoria' => 'Caixa',
        ));
        $oAclRota = AclRota::model()->findByAttributes(array(
            'controller' => 'logCaixa',
            'action' => 'admin'
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'logCaixa',
            'action' => 'view',
            'titulo' => 'Visualizar',
            'categoria' => 'Caixa',
            'acl_rota_id' => $oAclRota->id,
            'exibir' => FALSE
        ));
        
    }

    public function down() {
        echo "m160201_163600_inserir_novas_permissoes_caixas does not support migration down.\n";
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
