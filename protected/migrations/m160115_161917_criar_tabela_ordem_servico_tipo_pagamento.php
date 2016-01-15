<?php

class m160115_161917_criar_tabela_ordem_servico_tipo_pagamento extends CDbMigration {

    public function safeUp() {
        $this->createTable('ordens_servico_tipos_pagamento', array(
            'id' => 'pk not null auto_increment',
            'ordem_servico_id' => 'integer',
            'forma_pagamento_id' => 'integer',
            'parcelas' => 'integer',
            'valor' => 'decimal(10,2)',
        ));
    }

    public function down() {
        echo "m160115_161917_criar_tabela_ordem_servico_tipo_pagamento does not support migration down.\n";
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
