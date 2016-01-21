<?php

class m160121_152139_alterar_tabela_financeiro extends CDbMigration {

    public function safeUp() {
        $this->addColumn('financeiro', 'status', 'integer default 0');
    }

    public function down() {
        echo "m160121_152139_alterar_tabela_financeiro does not support migration down.\n";
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
