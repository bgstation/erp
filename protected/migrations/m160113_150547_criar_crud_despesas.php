<?php

class m160113_150547_criar_crud_despesas extends CDbMigration {

    public function safeUp() {
        $this->createTable('tipo_despesas', array(
            'id' => 'pk not null auto_increment',
            'titulo' => 'varchar(200)',
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
