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

        $builder=Yii::app()->db->schema->commandBuilder;
        $command=$builder->createMultipleInsertCommand('tbl_bind_user_role', [
                ['id_userrole'=>1, 'user_id'=>1, 'role_id'=>1],
                ['id_userrole'=>2, 'user_id'=>2, 'role_id'=>1],
                ['id_userrole'=>3, 'user_id'=>3, 'role_id'=>1],
                ['id_userrole'=>4, 'user_id'=>4, 'role_id'=>1],
                ['id_userrole'=>5, 'user_id'=>5, 'role_id'=>1],
                ['id_userrole'=>6, 'user_id'=>6, 'role_id'=>1],
                ['id_userrole'=>7, 'user_id'=>7, 'role_id'=>1],
                ['id_userrole'=>8, 'user_id'=>8, 'role_id'=>1],
                ['id_userrole'=>9, 'user_id'=>9, 'role_id'=>1],
                ['id_userrole'=>10, 'user_id'=>10, 'role_id'=>1],
                ['id_userrole'=>11, 'user_id'=>11, 'role_id'=>1],
                ['id_userrole'=>12, 'user_id'=>12, 'role_id'=>1],
                ['id_userrole'=>13, 'user_id'=>13, 'role_id'=>1],
                ['id_userrole'=>14, 'user_id'=>14, 'role_id'=>1],
                ['id_userrole'=>15, 'user_id'=>15, 'role_id'=>1],
                ['id_userrole'=>16, 'user_id'=>16, 'role_id'=>1],
                ['id_userrole'=>17, 'user_id'=>17, 'role_id'=>1],
                ['id_userrole'=>18, 'user_id'=>18, 'role_id'=>1],
                ['id_userrole'=>19, 'user_id'=>19, 'role_id'=>1],
                ['id_userrole'=>20, 'user_id'=>20, 'role_id'=>1],
                ['id_userrole'=>21, 'user_id'=>21, 'role_id'=>1],
                ['id_userrole'=>22, 'user_id'=>22, 'role_id'=>1],
                ['id_userrole'=>23, 'user_id'=>23, 'role_id'=>1],
                ['id_userrole'=>24, 'user_id'=>1, 'role_id'=>2],
                ['id_userrole'=>25, 'user_id'=>14, 'role_id'=>2],
                ['id_userrole'=>26, 'user_id'=>18, 'role_id'=>2],
                ['id_userrole'=>27, 'user_id'=>19, 'role_id'=>2],
                ['id_userrole'=>28, 'user_id'=>21, 'role_id'=>2],
                ['id_userrole'=>29, 'user_id'=>22, 'role_id'=>2],
                ['id_userrole'=>30, 'user_id'=>23, 'role_id'=>2],
                ['id_userrole'=>31, 'user_id'=>3, 'role_id'=>3],
                ['id_userrole'=>32, 'user_id'=>4, 'role_id'=>3],
            ]);
        $command->execute();

        $this->execute('
                ALTER TABLE `tbl_bind_user_role`
                ADD PRIMARY KEY (`id_userrole`),
                ADD KEY `user_id_idx` (`user_id`),
                ADD KEY `role_id_idx` (`role_id`);
            ');

        $this->execute('
                ALTER TABLE `tbl_bind_user_role`
                ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
            ');
	}

	public function down()
	{
        $this->dropForeignKey('user', 'tbl_bind_user_role');
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