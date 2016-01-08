<?php

class m160108_172602_alterar_tabela_clientes_carros extends CDbMigration
{
	public function safeUp()
	{
            $this->addColumn('clientes_carros', 'modelo_id', 'integer');
            $this->renameColumn('clientes_carros', 'marca_carro_id', 'marca_id');
	}

	public function down()
	{
		echo "m160108_172602_alterar_tabela_clientes_carros does not support migration down.\n";
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