<?php

class m160112_113711_criar_crud_log_itens_nao_cadastrados extends CDbMigration {

    public function safeUp() {
        $this->createTable('log_itens_nao_cadastrados', array(
            'id' => 'pk  not null auto_increment',
            'ordem_servico_item_id' => 'integer',
            'titulo' => 'varchar(200)',
            'preco' => 'decimal(10,2)',
        ));
    }

    public function down() {
        echo "m160112_113711_criar_crud_log_itens_nao_cadastrados does not support migration down.\n";
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
