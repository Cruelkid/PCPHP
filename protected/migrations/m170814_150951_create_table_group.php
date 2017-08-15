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

        $builder=Yii::app()->db->schema->commandBuilder;
        $command=$builder->createMultipleInsertCommand('tbl_group', [
                ['id_group'=>1, 'name'=>'Dp119-PHP', 'location'=>3, 'date_start'=>`0000-00-00 00:00:00`, 'date_finish'=>NULL, 'competention'=>5],
            ]);
        $command->execute();

        $this->execute('
                ALTER TABLE `tbl_group`
                ADD PRIMARY KEY (`id_group`),
                ADD KEY `location_idx` (`location`),
                ADD KEY `competention_idx` (`competention`);
            ');

        $this->execute('
                ALTER TABLE `tbl_group`
                ADD CONSTRAINT `location_group` FOREIGN KEY (`location`) REFERENCES `tbl_location` (`id_location`) ON DELETE CASCADE ON UPDATE CASCADE;
            ');
	}

	public function down()
	{
        $this->dropForeignKey('location_group', 'tbl_group');
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