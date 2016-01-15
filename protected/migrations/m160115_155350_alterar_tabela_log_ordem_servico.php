<?php

class m160115_155350_alterar_tabela_log_ordem_servico extends CDbMigration {

    public function safeUp() {
        $this->addColumn('log_ordens_servico', 'observacao', 'text');
    }

    public function down() {
        echo "m160115_155350_alterar_tabela_log_ordem_servico does not support migration down.\n";
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
