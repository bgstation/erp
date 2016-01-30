<?php

class m160111_111245_criar_crud_ordens_servico_itens extends CDbMigration {

    public function safeUp() {
        $this->createTable('ordens_servico_itens', array(
            'id' => 'pk  not null auto_increment',
            'ordem_servico_id' => 'integer',
            'tipo_item_id' => 'integer',
            'item_id' => 'integer',
            'observacao' => 'text',
            'excluido' => 'boolean default false',
        ));
    }

    public function safeDown() {
        echo "m160111_111245_criar_crud_ordens_servico_itens does not support migration down.\n";
        return false;
    }
}
