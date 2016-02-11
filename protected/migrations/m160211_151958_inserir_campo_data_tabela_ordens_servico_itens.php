<?php

class m160211_151958_inserir_campo_data_tabela_ordens_servico_itens extends CDbMigration {

    public function safeUp() {
        $this->addColumn('ordens_servico_itens', 'datahora_insercao', 'datetime');
        $this->addColumn('ordens_servico_itens', 'datahora_ultima_atualizacao', 'datetime');
    }

    public function safeDown() {
        echo "m160211_151958_inserir_campo_data_tabela_ordens_servico_itens does not support migration down.\n";
        return false;
    }

}
