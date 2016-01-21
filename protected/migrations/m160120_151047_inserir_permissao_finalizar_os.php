<?php

class m160120_151047_inserir_permissao_finalizar_os extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'ordemServico',
            'action' => 'finalizar',
            'titulo' => 'Finalizar',
            'categoria' => 'Ordem Serviço',
        ));
    }

    public function safeDown() {
        echo "m160120_151047_inserir_permissao_finalizar_os does not support migration down.\n";
        return false;
    }

}
