<?php

class m160127_214951_criar_permissao_para_adicionar_itens_nao_cadastrados extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'logItemNaoCadastrado',
            'action' => 'update',
            'titulo' => 'Atualizar',
            'categoria' => 'Itens Não Cadastrados',
        ));
    }

    public function safeDown() {
        echo "m160127_214951_criar_permissao_para_adicionar_itens_nao_cadastrados does not support migration down.\n";
        return false;
    }

}
