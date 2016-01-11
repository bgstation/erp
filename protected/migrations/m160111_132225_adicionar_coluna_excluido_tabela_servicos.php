<?php

class m160111_132225_adicionar_coluna_excluido_tabela_servicos extends CDbMigration
{
	public function safeUp()
	{
            $this->addColumn('servicos', 'excluido', 'boolean default false');
	}

	public function down()
	{
		echo "m160111_132225_adicionar_coluna_excluido_tabela_servicos does not support migration down.\n";
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