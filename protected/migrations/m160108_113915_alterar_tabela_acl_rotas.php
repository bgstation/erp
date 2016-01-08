<?php

class m160108_113915_alterar_tabela_acl_rotas extends CDbMigration
{
	public function safeUp()
	{
            $this->addColumn('acl_rotas', 'acl_rota_id', 'integer');
            $this->addColumn('acl_rotas', 'exibir', 'boolean default true');
	}

	public function down()
	{
		echo "m160108_113915_alterar_tabela_acl_rotas does not support migration down.\n";
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