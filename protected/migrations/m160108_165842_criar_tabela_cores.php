<?php

class m160108_165842_criar_tabela_cores extends CDbMigration {

    public function safeUp() {
        $this->createTable('cores', array(
            'id' => 'pk  not null auto_increment',
            'titulo' => 'varchar(20)',
            'rgb' => 'varchar(20)',
            'excluido' => 'boolean default false',
        ));
    }

    public function down() {
        echo "m160108_165842_criar_tabela_cores does not support migration down.\n";
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
