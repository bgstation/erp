<?php

class m160111_110436_criar_crud_ordens_servicos extends CDbMigration
{
    public function safeUp() {
        $this->createTable('ordens_servico', array(
            'id' => 'pk  not null auto_increment',
            'cliente_id' => 'integer',
            'cliente_carro_id' => 'integer',
            'forma_pagamento_id' => 'integer',
            'observacao' => 'text',
            'excluido' => 'boolean default false',
        ));
    }

    public function down()
	{
		echo "m160111_110436_criar_crud_ordens_servicos does not support migration down.\n";
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