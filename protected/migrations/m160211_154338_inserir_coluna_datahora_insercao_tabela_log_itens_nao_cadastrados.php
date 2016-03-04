<?php

class m160211_154338_inserir_coluna_datahora_insercao_tabela_log_itens_nao_cadastrados extends CDbMigration {

    public function safeUp() {
        $this->addColumn('log_itens_nao_cadastrados', 'datahora_insercao', 'datetime');
    }

    public function safeDown() {
        echo "m160211_154338_inserir_coluna_datahora_insercao_tabela_log_itens_nao_cadastrados does not support migration down.\n";
        return false;
    }

}
