<?php

class m160114_104938_criar_crud_tipos_produto extends CDbMigration {

    public function safeUp() {
        $this->createTable('tipos_produtos', array(
            'id' => 'pk not null auto_increment',
            'titulo' => 'varchar(200)',
            'excluido' => 'boolean default false',
        ));
    }

    public function down() {
        echo "m160114_104938_criar_crud_tipos_produto does not support migration down.\n";
        return false;
    }

}
