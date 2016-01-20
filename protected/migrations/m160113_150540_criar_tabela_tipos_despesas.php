<?php

class m160113_150540_criar_tabela_tipos_despesas extends CDbMigration {

    public function safeUp() {
        $this->createTable('tipos_despesas', array(
            'id' => 'pk not null auto_increment',
            'titulo' => 'varchar(200)',
            'excluido' => 'boolean default false',
        ));
    }

    public function safeDown() {
        echo "m160113_150540_criar_tabela_tipos_despesas does not support migration down.\n";
        return false;
    }

}