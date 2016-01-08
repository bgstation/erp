<?php

class m160108_165600_alterar_tabela_clientes_carros extends CDbMigration
{
	public function safeUp()
	{
            $this->addColumn('clientes_carros', 'cor_id', 'integer');
	}

	public function down()
	{
		echo "m160108_165600_alterar_tabela_clientes_carros does not support migration down.\n";
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