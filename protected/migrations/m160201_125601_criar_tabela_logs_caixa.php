<?php

class m160201_125601_criar_tabela_logs_caixa extends CDbMigration {

    public function safeUp() {
        $this->createTable('logs_caixa', array(
            'id' => 'pk not null auto_increment',
            'operacao_id' => 'integer',
            'descricao' => 'varchar(200)',
            'valor' => 'decimal(10,2)',
            'usuario_id' => 'varchar(200)',
            'data_hora' => 'DATETIME',
        ));
    }

    public function down() {
        echo "m160201_125601_criar_tabela_logs_caixa does not support migration down.\n";
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
