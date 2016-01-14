<?php

class m160113_150547_criar_crud_despesas extends CDbMigration {

    public function safeUp() {
        $this->createTable('despesas', array(
            'id' => 'pk not null auto_increment',
            'tipo_despesas_id' => 'integer',
            'preco' => 'decimal(10,2)',
            'observacao' => 'text',
            'quantidade' => 'integer',
            'data_hora' => 'DATETIME',
            'usuario_id' => 'integer',
            'excluido' => 'boolean default false',
        ));
    }

    public function down() {
        echo "m160113_150547_criar_crud_despesas does not support migration down.\n";
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
