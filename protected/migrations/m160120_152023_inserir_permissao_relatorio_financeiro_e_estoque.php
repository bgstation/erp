<?php

class m160120_152023_inserir_permissao_relatorio_financeiro_e_estoque extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'financeiro',
            'action' => 'admin',
            'titulo' => 'Financeiro',
            'categoria' => 'Relatórios',
        ));

        $this->insert('acl_rotas', array(
            'controller' => 'produto',
            'action' => 'estoque',
            'titulo' => 'Estoque',
            'categoria' => 'Relatórios',
        ));
    }

    public function safeDown() {
        echo "m160120_152023_inserir_permissao_relatorio_financeiro_e_estoque does not support migration down.\n";
        return false;
    }

}
