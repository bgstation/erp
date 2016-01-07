<?php

class m160107_160359_criar_tabela_de_produtos extends CDbMigration {

    public function safeUp() {
        $this->createTable('produtos', array(
            'id' => 'pk  not null auto_increment',
            'titulo' => 'varchar(200)',
            'codigo_barra' => 'varchar(300)',
            'marca_id' => 'integer',
            'modelo_id' => 'integer',
            'preco' => 'decimal(10,2)',
            'observacao' => 'text',
            'quantidade' => 'integer',
            'excluido' => 'boolean default false',
                )
        );
    }

    public function down() {
        echo "m160107_160359_criar_tabela_de_produtos does not support migration down.\n";
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
