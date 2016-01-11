<?php

class m160111_120410_alterar_tabela_clientes extends CDbMigration
{
	public function safeUp()
	{
            $this->alterColumn('clientes', 'data_cadastro', 'datetime');
	}

	public function down()
	{
		echo "m160111_120410_alterar_tabela_clientes does not support migration down.\n";
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