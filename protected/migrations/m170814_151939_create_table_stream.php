<?php

class m170814_151939_create_table_stream extends CDbMigration
{
	public function up()
	{
        $this->execute('
                CREATE TABLE IF NOT EXISTS `tbl_stream` (
                `id_stream` int(11) NOT NULL,
                `name` varchar(45) DEFAULT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
            ');

        $this->execute('
                INSERT INTO `tbl_stream` (`id_stream`, `name`) VALUES
                (1, `SoftwareDevelopment`),
                (2, `QualityControl`),
                (3, `ITandCM`),
                (4, `UX`);
            ');

        $this->execute('
                ALTER TABLE `tbl_stream`
                ADD PRIMARY KEY (`id_stream`);
            ');
	}

	public function down()
	{
        $this->dropTable('tbl_stream');
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