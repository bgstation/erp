<?php

class m160107_161612_criar_tabela_de_modelos extends CDbMigration {

    public function safeUp() {
        $this->createTable('modelos', array(
            'id' => 'pk  not null auto_increment',
            'titulo' => 'varchar(200)',
            'marca_id' => 'integer',
            'observacao' => 'text',
            'excluido' => 'boolean default false',
        ));
    }

    public function down() {
        echo "m160107_161612_criar_tabela_de_modelos does not support migration down.\n";
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
