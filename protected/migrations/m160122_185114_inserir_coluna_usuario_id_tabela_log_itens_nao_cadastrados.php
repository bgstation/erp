<?php

class m160122_185114_inserir_coluna_usuario_id_tabela_log_itens_nao_cadastrados extends CDbMigration {

    public function safeUp() {
        $this->addColumn('log_itens_nao_cadastrados', 'usuario_id', 'integer references usuarios(id)');
    }

    public function safeDown() {
        echo "m160122_185114_inserir_coluna_usuario_id_tabela_log_itens_nao_cadastrados does not support migration down.\n";
        return false;
    }

}
