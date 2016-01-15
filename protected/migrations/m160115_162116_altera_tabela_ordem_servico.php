<?php

class m160115_162116_altera_tabela_ordem_servico extends CDbMigration
{
	public function safeUp()
	{
            $this->addColumn("ordens_servico", 'desconto', 'decimal(10,2)');
	}

	public function down()
	{
		echo "m160115_162116_altera_tabela_ordem_servico does not support migration down.\n";
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