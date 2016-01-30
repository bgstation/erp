<?php

class m160130_042858_criar_permissao_editar_ordem_servico_finalizada extends CDbMigration {

    public function safeUp() {
        $this->insert('acl_rotas', array(
            'controller' => 'ordemServico',
            'action' => 'atualizarFinalizada',
            'titulo' => 'Atualizar Finalizada',
            'categoria' => 'Ordem Serviço',
        ));
    }

    public function safeDown() {
        echo "m160130_042858_criar_permissao_editar_ordem_servico_finalizada does not support migration down.\n";
        return false;
    }

}
