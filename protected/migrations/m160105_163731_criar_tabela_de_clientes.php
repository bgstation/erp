<?php

class m160105_163731_criar_tabela_de_clientes extends CDbMigration {

    public function safeUp() {
        $this->createTable('clientes', array(
            'id' => 'pk  not null auto_increment',
            'email' => 'varchar(100)',
            'nome' => 'varchar(100)',
            'cpf' => 'varchar(14)',
            'sexo' => 'varchar(1)',
            'telefone_fixo' => 'varchar(20)',
            'celular' => 'varchar(20)',
            'endereco' => 'varchar(100)',
            'numero' => 'integer',
            'complemento' => 'varchar(20)',
            'data_cadastro' => 'varchar(15)',
        ));
        
    }

    public function down() {
        echo "m160105_163731_criar_tabela_de_clientes does not support migration down.\n";
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
