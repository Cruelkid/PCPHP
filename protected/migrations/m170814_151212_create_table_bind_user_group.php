<?php

class m170814_151212_create_table_bind_user_group extends CDbMigration
{
	public function up()
	{
        $this->execute('CREATE TABLE IF NOT EXISTS `tbl_bind_user_group` (
            `id_usergroup` int(11) NOT NULL,
            `user_id` int(11) NOT NULL,
            `group_id` int(11) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');

        $this->execute('INSERT INTO `tbl_bind_user_group` (`id_usergroup`, `user_id`, `group_id`) VALUES
            (1, 14, 1);');

        $this->execute('
                ALTER TABLE `tbl_bind_user_group`
                ADD PRIMARY KEY (`id_usergroup`),
                ADD KEY `user_id_idx` (`user_id`),
                ADD KEY `group_id_idx` (`group_id`);
            ');

        $this->execute('
                ALTER TABLE `tbl_bind_user_group`
                ADD CONSTRAINT `group_id` FOREIGN KEY (`group_id`) REFERENCES `tbl_group` (`id_group`) ON DELETE CASCADE ON UPDATE CASCADE,
                ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
            ');
	}

	public function down()
	{
        $this->dropTable('tbl_bind_user_group');
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