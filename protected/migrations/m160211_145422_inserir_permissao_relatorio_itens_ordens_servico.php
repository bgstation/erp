<?php

class m160211_145422_inserir_permissao_relatorio_itens_ordens_servico extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'ordemServicoItem',
            'action' => 'admin',
            'titulo' => 'Visualizar',
            'categoria' => 'Itens Ordens de Serviço',
        ));
    }

    public function safeDown() {
        echo "m160211_145422_inserir_permissao_relatorio_itens_ordens_servico does not support migration down.\n";
        return false;
    }

}
