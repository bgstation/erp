<?php

class m160113_122830_criar_crud_compras extends CDbMigration {

    public function safeUp() {
        $this->createTable('compras', array(
            'id' => 'pk  not null auto_increment',
            'nota_fiscal' => 'varchar(200)',
            'produto_id' => 'integer',
            'preco' => 'decimal(10,2)',
            'observacao' => 'text',
            'quantidade' => 'integer',
            'data_hora' => 'DATETIME',
            'usuario_id' => 'integer',
            'excluido' => 'boolean default false',
        ));
    }

    public function down() {
        echo "m160113_122830_criar_crud_compras does not support migration down.\n";
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
