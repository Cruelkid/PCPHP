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

        $builder=Yii::app()->db->schema->commandBuilder;
        $command=$builder->createMultipleInsertCommand('tbl_role', [
                ['id_role'=>1, 'name'=>'teacher'],
                ['id_role'=>2, 'name'=>'coordinator'],
                ['id_role'=>3, 'name'=>'administrator'],
                ['id_role'=>4, 'name'=>'recruiter'],
                ['id_role'=>5, 'name'=>'guest'],
                ['id_role'=>6, 'name'=>'tse'],
            ]);
        $command->execute();

        $this->execute('
                ALTER TABLE `tbl_role`
                ADD PRIMARY KEY (`id_role`);
            ');

        $this->execute('
                ALTER TABLE `tbl_bind_user_role`
                ADD CONSTRAINT `role` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
            ');
	}

	public function down()
	{
        $this->dropForeignKey('role', 'tbl_bind_user_role');
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