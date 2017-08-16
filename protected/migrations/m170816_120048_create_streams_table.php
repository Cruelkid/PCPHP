<?php

class m170816_120048_create_streams_table extends CDbMigration
{
	public function up()
	{
        $this->execute('
            CREATE TABLE IF NOT EXISTS `streams` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `name` VARCHAR(45) NOT NULL,
            PRIMARY KEY (`id`))
            ENGINE = InnoDB DEFAULT CHARSET=utf8;
        ');
	}

	public function down()
	{
		$this->dropTable('streams');
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