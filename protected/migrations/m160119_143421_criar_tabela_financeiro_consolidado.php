<?php

class m160119_143421_criar_tabela_financeiro_consolidado extends CDbMigration {

    public function safeUp() {
        $this->createTable('financeiro', array(
            'id' => 'pk not null auto_increment',
            'tipo_item' => 'integer',
            'tipo_item_id' => 'integer',
            'descricao' => 'varchar(200)',
            'valor' => 'decimal(10,2)',
            'parcelas' => 'integer',
            'usuario' => 'varchar(200)',
            'data_hora' => 'DATETIME',
        ));
    }

    public function down() {
        echo "m160119_143421_criar_tabela_financeiro_consolidado does not support migration down.\n";
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
