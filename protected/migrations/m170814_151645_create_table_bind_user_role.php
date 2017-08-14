<?php

class m170814_151645_create_table_bind_user_role extends CDbMigration
{
	public function up()
	{
        $this->execute('CREATE TABLE IF NOT EXISTS `tbl_bind_user_role` (
            `id_userrole` int(11) NOT NULL,
            `user_id` int(11) NOT NULL,
            `role_id` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
        ');

        $this->execute('
                INSERT INTO `tbl_bind_user_role` (`id_userrole`, `user_id`, `role_id`) VALUES
                    (1, 1, 1),
                    (2, 2, 1),
                    (3, 3, 1),
                    (4, 4, 1),
                    (5, 5, 1),
                    (6, 6, 1),
                    (7, 7, 1),
                    (8, 8, 1),
                    (9, 9, 1),
                    (10, 10, 1),
                    (11, 11, 1),
                    (12, 12, 1),
                    (13, 13, 1),
                    (14, 14, 1),
                    (15, 15, 1),
                    (16, 16, 1),
                    (17, 17, 1),
                    (18, 18, 1),
                    (19, 19, 1),
                    (20, 20, 1),
                    (21, 21, 1),
                    (22, 22, 1),
                    (23, 23, 1),
                    (24, 1, 2),
                    (25, 14, 2),
                    (26, 18, 2),
                    (27, 19, 2),
                    (28, 21, 2),
                    (29, 22, 2),
                    (30, 23, 2),
                    (31, 3, 3),
                    (32, 4, 3);
            ');

        $this->execute('
                ALTER TABLE `tbl_bind_user_role`
                ADD PRIMARY KEY (`id_userrole`),
                ADD KEY `user_id_idx` (`user_id`),
                ADD KEY `role_id_idx` (`role_id`);
            ');

        $this->execute('
                ALTER TABLE `tbl_bind_user_role`
                ADD CONSTRAINT `role` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
                ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
            ');
	}

	public function down()
	{
        $this->dropTable('tbl_bind_user_role');
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