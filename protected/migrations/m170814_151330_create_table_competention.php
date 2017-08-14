<?php

class m170814_151330_create_table_competention extends CDbMigration
{
	public function up()
	{
        $this->execute('
                CREATE TABLE IF NOT EXISTS `tbl_competention` (
                  `id_competention` int(11) NOT NULL,
                  `name` varchar(45) DEFAULT NULL,
                  `stream_id` int(11) NOT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
            ');

        $this->execute('
                INSERT INTO `tbl_competention` (`id_competention`, `name`, `stream_id`) VALUES
                (1, `WebUI`, 1),
                (2, `JavaScriptUI`, 1),
                (3, `LAMP`, 1),
                (4, `Python`, 1),
                (5, `Php`, 1),
                (6, `.Net`, 1),
                (7, `Java`, 1),
                (8, `iOS`, 1),
                (9, `C/C++`, 1),
                (10, `Deplhi`, 1),
                (11, `RDBMS`, 1),
                (12, `MQC`, 2),
                (13, `ATQC`, 2),
                (14, `ISTQB`, 2),
                (15, `DevOps`, 3),
                (16, `UX`, 4);
            ');

        $this->execute('
                ALTER TABLE `tbl_competention`
                ADD PRIMARY KEY (`id_competention`),
                ADD KEY `stream_id_idx` (`stream_id`);
            ');

        $this->execute('
                ALTER TABLE `tbl_competention`
                ADD CONSTRAINT `stream_id` FOREIGN KEY (`stream_id`) REFERENCES `tbl_stream` (`id_stream`) ON DELETE CASCADE ON UPDATE CASCADE;
            ');
	}

	public function down()
	{
        $this->dropTable('tbl_competention');
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