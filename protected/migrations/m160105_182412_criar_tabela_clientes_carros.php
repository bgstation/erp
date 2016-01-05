<?php

class m160105_182412_criar_tabela_clientes_carros extends CDbMigration
{
	public function safeUp()
	{
            $this->createTable('clientes_carros', array(
                'id' => 'pk  not null auto_increment',
                'placa' => 'varchar(8) not null',
                'marca_carro_id' => 'integer',
                'cliente_id' => 'integer not null',
                'observacao' => 'text',
                'excluido' => 'BOOLEAN DEFAULT FALSE',
            ));
	}

	public function down()
	{
		echo "m160105_182412_criar_tabela_clientes_carros does not support migration down.\n";
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