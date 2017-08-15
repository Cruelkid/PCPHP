<?php

class m170814_151939_create_table_stream extends CDbMigration
{
	public function up()
	{
        $this->execute('
                CREATE TABLE IF NOT EXISTS `tbl_stream` (
                `id_stream` int(11) NOT NULL,
                `name` varchar(45) DEFAULT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
            ');

        $builder=Yii::app()->db->schema->commandBuilder;
        $command=$builder->createMultipleInsertCommand('tbl_stream', [
                ['id_stream'=>1, 'name'=>'SoftwareDevelopment'],
                ['id_stream'=>2, 'name'=>'QualityControl'],
                ['id_stream'=>3, 'name'=>'ITandCM'],
                ['id_stream'=>4, 'name'=>'UX'],
            ]);
        $command->execute();

        $this->execute('
                ALTER TABLE `tbl_stream`
                ADD PRIMARY KEY (`id_stream`);
            ');

        $this->execute('
                ALTER TABLE `tbl_competention`
                ADD CONSTRAINT `stream_id` FOREIGN KEY (`stream_id`) REFERENCES `tbl_stream` (`id_stream`) ON DELETE CASCADE ON UPDATE CASCADE;
            ');
	}

	public function down()
	{
        $this->dropForeignKey('stream_id', 'tbl_competention');
        $this->dropTable('tbl_stream');
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