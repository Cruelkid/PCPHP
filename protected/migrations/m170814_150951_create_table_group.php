<?php

class m170814_150951_create_table_group extends CDbMigration
{
	public function up()
	{
		$this->execute('
                CREATE TABLE IF NOT EXISTS `tbl_group` (
                `id_group` int(11) NOT NULL,
                `name` varchar(45) DEFAULT NULL,
                `location` int(11) NOT NULL,
                `date_start` datetime DEFAULT NULL,
                `date_finish` datetime DEFAULT NULL,
                `competention` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
            ');

        $this->execute('
                INSERT INTO `tbl_group` (`id_group`, `name`, `location`, `date_start`, `date_finish`, `competention`) VALUES
                (1, `Dp119-PHP`, 3, `0000-00-00 00:00:00`, NULL, 5);
            ');

        $this->execute('
                ALTER TABLE `tbl_group`
                ADD PRIMARY KEY (`id_group`),
                ADD KEY `location_idx` (`location`),
                ADD KEY `competention_idx` (`competention`);
            ');

        $this->execute('
                ALTER TABLE `tbl_group`
                ADD CONSTRAINT `competention_group` FOREIGN KEY (`competention`) REFERENCES `tbl_competention` (`id_competention`) ON DELETE CASCADE ON UPDATE CASCADE,
                ADD CONSTRAINT `location_group` FOREIGN KEY (`location`) REFERENCES `tbl_location` (`id_location`) ON DELETE CASCADE ON UPDATE CASCADE;
            ');
	}

	public function down()
	{
        $this->dropTable('tbl_group');
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