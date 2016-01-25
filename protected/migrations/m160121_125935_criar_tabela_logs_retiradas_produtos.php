<?php

class m160121_125935_criar_tabela_logs_retiradas_produtos extends CDbMigration {

    public function safeUp() {
        $this->createTable('logs_retiradas_produtos', array(
            'id' => 'pk not null auto_increment',
            'produto_id' => 'integer',
            'quantidade' => 'integer',
            'usuario_id' => 'integer',
            'observacao' => 'text',
            'data_hora' => 'DATETIME',
            'ordem_servico_id' => 'integer',
            'excluido' => 'boolean default false',
        )); 
    }

    public function down() {
        echo "m160121_125935_criar_tabela_logs_retiradas_produtos does not support migration down.\n";
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
