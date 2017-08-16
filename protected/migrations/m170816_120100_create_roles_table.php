<?php

class m170816_120100_create_roles_table extends CDbMigration
{
	public function up()
	{
        $this->execute('
            CREATE TABLE IF NOT EXISTS `roles` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(45) NOT NULL,
            PRIMARY KEY (`id`))
            ENGINE = InnoDB DEFAULT CHARSET=utf8;
        ');
	}

	public function down()
	{
		$this->dropTable('roles');
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