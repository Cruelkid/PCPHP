<?php

class m170814_150832_create_table_location extends CDbMigration
{
	public function up()
	{
		$this->execute('
                CREATE TABLE IF NOT EXISTS `tbl_location` (
                `id_location` int(11) NOT NULL,
                `name` varchar(45) DEFAULT NULL,
                `city` varchar(45) DEFAULT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
            ');

        $this->execute('
                INSERT INTO `tbl_location` (`id_location`, `name`, `city`) VALUES
                (1, `IF`, `Ivano-Frankivsk`),
                (2, `Lv`, `Lviv`),
                (3, `Dp`, `Dnipro`),
                (4, `Ch`, `Chernivtsi`),
                (5, `Kv`, `Kyiv`),
                (6, `Kh`, `Kharkiv`),
                (7, `Rv`, `Rivne`),
                (8, `Sf`, `Sofia`);
            ');

        $this->execute('
                ALTER TABLE `tbl_location`
                ADD PRIMARY KEY (`id_location`);
            ');

        $this->execute('
                ALTER TABLE `tbl_user`
                ADD CONSTRAINT `location` FOREIGN KEY (`location`) REFERENCES `tbl_location` (`id_location`) ON DELETE CASCADE ON UPDATE CASCADE;
            ');
	}

	public function down()
	{
		$this->dropTable('tbl_location');
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