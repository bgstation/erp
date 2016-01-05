<?php

class m160105_205103_criar_tabela_de_usuarios extends CDbMigration {

    public function safeUp() {
        $this->createTable('usuarios', array(
            'id' => 'pk  not null auto_increment',
            'nome' => 'varchar(100)',
            'login' => 'varchar(100)',
            'senha' => 'varchar(20)',
            'tipo_usuario_id' => 'integer references tipos_usuarios(id)',
            'excluido' => 'boolean default false',
            'data_cadastro' => 'DATETIME',
        ));
    }

    public function down() {
        echo "m160105_205103_criar_tabela_de_usuarios does not support migration down.\n";
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
