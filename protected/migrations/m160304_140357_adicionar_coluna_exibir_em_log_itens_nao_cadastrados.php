<?php

class m160304_140357_adicionar_coluna_exibir_em_log_itens_nao_cadastrados extends CDbMigration
{
	public function safeUp()
	{
            $this->addColumn('log_itens_nao_cadastrados', 'exibir', 'boolean default true');
	}

	public function down()
	{
		echo "m160304_140357_adicionar_coluna_exibir_em_log_itens_nao_cadastrados does not support migration down.\n";
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