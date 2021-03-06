<?php

class m160112_113711_criar_crud_log_itens_nao_cadastrados extends CDbMigration {

    public function safeUp() {
        $this->createTable('log_itens_nao_cadastrados', array(
            'id' => 'pk  not null auto_increment',
            'ordem_servico_item_id' => 'integer',
            'titulo' => 'varchar(200)',
            'preco' => 'decimal(10,2)',
            'cadastrado' => 'boolean default false',
        ));
    }

    public function safeDown() {
        echo "m160112_113711_criar_crud_log_itens_nao_cadastrados does not support migration down.\n";
        return false;
    }

}
