<?php

class m170814_151803_create_table_role extends CDbMigration
{
	public function up()
	{
        $this->execute('
                CREATE TABLE IF NOT EXISTS `tbl_role` (
                `id_role` int(11) NOT NULL,
                `name` varchar(45) DEFAULT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
            ');

        $this->execute('
                INSERT INTO `tbl_role` (`id_role`, `name`) VALUES
                (1, `teacher`),
                (2, `coordinator`),
                (3, `administrator`),
                (4, `recruiter`),
                (5, `guest`),
                (6, `tse`);
            ');

        $this->execute('
                ALTER TABLE `tbl_role`
                ADD PRIMARY KEY (`id_role`);
            ');
	}

	public function down()
	{
        $this->dropTable('tbl_role');
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