<?php

class m160114_110420_inserir_coluna_na_tabela_produtos extends CDbMigration
{
	public function safeUp()
	{
            $this->addColumn('produtos', 'tipo_produto_id', 'integer');
	}

	public function down()
	{
		echo "m160114_110420_inserir_coluna_na_tabela_produtos does not support migration down.\n";
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