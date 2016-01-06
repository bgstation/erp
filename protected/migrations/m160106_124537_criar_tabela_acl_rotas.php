<?php

class m160106_124537_criar_tabela_acl_rotas extends CDbMigration {

    public function safeUp() {
        $this->createTable('acl_rotas', array(
            'id' => 'pk  not null auto_increment',
            'controller' => 'varchar(50)',
            'action' => 'varchar(50)',
            'titulo' => 'varchar(20)',
            'categoria' => 'varchar(20)',
            'descricao' => 'text',
            'excluido' => 'boolean default false',
            'UNIQUE (controller, action)',
        ));
    }

    public function down() {
        echo "m160106_124537_criar_tabela_acl_rotas does not support migration down.\n";
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
