<?php

class m160107_161607_criar_tabela_de_marcas extends CDbMigration
{
	public function safeUp() {
        $this->createTable('marcas', array(
            'id' => 'pk  not null auto_increment',
            'titulo' => 'varchar(200)',
            'observacao' => 'text',
            'excluido' => 'boolean default false',
            ));
	}

	public function down()
	{
		echo "m160107_161607_criar_tabela_de_marcas does not support migration down.\n";
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