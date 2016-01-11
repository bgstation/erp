<?php

class m160111_111253_criar_crud_log_ordens_servico extends CDbMigration {

    public function safeUp() {
        $this->createTable('log_ordens_servico', array(
            'id' => 'pk  not null auto_increment',
            'ordem_servico_id' => 'integer',
            'status' => 'integer',
            'data_hora' => 'DATETIME',
            'ip' => 'varchar(20)',
            'usuario_id' => 'integer',
        ));
    }

    public function down() {
        echo "m160111_111253_criar_crud_log_ordens_servico does not support migration down.\n";
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
