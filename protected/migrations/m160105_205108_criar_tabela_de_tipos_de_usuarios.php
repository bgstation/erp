<?php

class m160105_205108_criar_tabela_de_tipos_de_usuarios extends CDbMigration {

    public function safeUp() {
        $this->createTable('tipos_usuarios', array(
            'id' => 'pk  not null auto_increment',
            'titulo' => 'varchar(20)',
            'excluido' => 'boolean default false',
            'data_cadastro' => 'DATETIME',
        ));
    }

    public function down() {
        echo "m160105_205108_criar_tabela_de_tipos_de_usuarios does not support migration down.\n";
        return false;
    }

    /*
      // Use safeUp/safeDown to do migration with transaction
      public function safeUp()
      {
      }

      public function safeDown()
      {
      }
     */
}
