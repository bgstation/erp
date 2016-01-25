<?php

class m160111_230301_inserir_novas_permissoes_para_ordens_servicos extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'ordemServico',
            'action' => 'create',
            'titulo' => 'Abrir',
            'categoria' => 'Ordem Serviço',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'ordemServico',
            'action' => 'delete',
            'titulo' => 'Deletar',
            'categoria' => 'Ordem Serviço',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'ordemServico',
            'action' => 'admin',
            'titulo' => 'Visualizar',
            'categoria' => 'Ordem Serviço',
        ));
        $oAclRotaPai = AclRota::model()->naoExcluido()->findByAttributes(array(
            'controller' => 'ordemServico',
            'action' => 'create',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'ordemServico',
            'action' => 'getItensPorTipoJson',
            'titulo' => '',
            'categoria' => 'Ordem Serviço',
            'exibir' => false,
            'acl_rota_id' => $oAclRotaPai->id,
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'ordemServico',
            'action' => 'update',
            'titulo' => 'Modificar',
            'categoria' => 'Ordem Serviço',
            'exibir' => false,
            'acl_rota_id' => $oAclRotaPai->id,
        ));
        $oAclRotaPai3 = AclRota::model()->naoExcluido()->findByAttributes(array(
            'controller' => 'ordemServico',
            'action' => 'admin',
        ));
        $this->insert('acl_rotas', array(
            'controller' => 'ordemServico',
            'action' => 'view',
            'titulo' => 'Detalhes',
            'categoria' => 'Ordem Serviço',
            'exibir' => false,
            'acl_rota_id' => $oAclRotaPai3->id,
        ));
    }

    public function down() {
        echo "m160111_230301_inserir_novas_permissoes_para_ordens_servicos does not support migration down.\n";
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
