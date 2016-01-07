<?php

class m160107_114111_criar_tabela_servicos extends CDbMigration {

    public function safeUp() {
        $this->createTable('servicos', array(
            'id' => 'pk  not null auto_increment',
            'titulo' => 'varchar(200)',
            'preco' => 'decimal(10,2)',
            'observacao' => 'text',
                )
        );
    }

    public function down() {
        echo "m160107_114111_criar_tabela_servicos does not support migration down.\n";
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
