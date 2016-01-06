<?php

class m160106_132019_criar_tabela_acl_tipos_usuarios_rotas extends CDbMigration
{
	public function safeUp()
	{
            $this->createTable('acl_tipos_usuarios_rotas', array(
                'id' => 'pk  not null auto_increment',
                'acl_rota_id' => 'integer',
                'acl_tipo_usuario_id' => 'integer',
                'excluido' => 'boolean default false',
                'data_insercao' => 'DATETIME',
                'data_ultima_atualizacao' => 'DATETIME',
            ));
	}

	public function down()
	{
		echo "m160106_132019_criar_tabela_acl_tipos_usuarios_rotas does not support migration down.\n";
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