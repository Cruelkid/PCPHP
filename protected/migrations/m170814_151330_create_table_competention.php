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

        $builder=Yii::app()->db->schema->commandBuilder;
        $command=$builder->createMultipleInsertCommand('tbl_competention', [
                ['id_competention'=>1, 'name'=>'WebUI', 'stream_id'=>1],
                ['id_competention'=>2, 'name'=>'JavaScriptUI', 'stream_id'=>1],
                ['id_competention'=>3, 'name'=>'LAMP', 'stream_id'=>1],
                ['id_competention'=>4, 'name'=>'Python', 'stream_id'=>1],
                ['id_competention'=>5, 'name'=>'Php', 'stream_id'=>1],
                ['id_competention'=>6, 'name'=>'.Net', 'stream_id'=>1],
                ['id_competention'=>7, 'name'=>'Java', 'stream_id'=>1],
                ['id_competention'=>8, 'name'=>'iOS', 'stream_id'=>1],
                ['id_competention'=>9, 'name'=>'C/C++', 'stream_id'=>1],
                ['id_competention'=>10, 'name'=>'Delphi', 'stream_id'=>1],
                ['id_competention'=>11, 'name'=>'RDBMS', 'stream_id'=>1],
                ['id_competention'=>12, 'name'=>'MQC', 'stream_id'=>2],
                ['id_competention'=>13, 'name'=>'ATQC', 'stream_id'=>2],
                ['id_competention'=>14, 'name'=>'ISTQB', 'stream_id'=>2],
                ['id_competention'=>15, 'name'=>'DevOps', 'stream_id'=>3],
                ['id_competention'=>16, 'name'=>'UX', 'stream_id'=>4],
            ]);
        $command->execute();

        $this->execute('
                ALTER TABLE `tbl_competention`
                ADD PRIMARY KEY (`id_competention`),
                ADD KEY `stream_id_idx` (`stream_id`);
            ');

        $this->execute('
                ALTER TABLE `tbl_group`
                ADD CONSTRAINT `competention_group` FOREIGN KEY (`competention`) REFERENCES `tbl_competention` (`id_competention`) ON DELETE CASCADE ON UPDATE CASCADE;
            ');
	}

	public function down()
	{
        $this->dropForeignKey('competention_group', 'tbl_group');
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