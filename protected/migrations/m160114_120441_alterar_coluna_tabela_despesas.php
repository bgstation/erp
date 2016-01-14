<?php

class m160114_120441_alterar_coluna_tabela_despesas extends CDbMigration
{
	public function safeUp()
	{
            $this->renameColumn('despesas', 'tipo_despesas_id', 'tipo_despesa_id');
	}

	public function down()
	{
		echo "m160114_120441_alterar_coluna_tabela_despesas does not support migration down.\n";
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