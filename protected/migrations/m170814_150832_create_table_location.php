<?php

class m170814_150832_create_table_location extends CDbMigration
{
	public function up()
	{
		$this->execute('
                CREATE TABLE IF NOT EXISTS `tbl_location` (
                `id_location` int(11) NOT NULL,
                `name` varchar(45) DEFAULT NULL,
                `city` varchar(45) DEFAULT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
            ');

        $builder=Yii::app()->db->schema->commandBuilder;
        $command=$builder->createMultipleInsertCommand('tbl_location', [
                ['id_location'=>1, 'name'=>'IF', 'city'=>'Ivano-Frankivsk'],
                ['id_location'=>2, 'name'=>'Lv', 'city'=>'Lviv'],
                ['id_location'=>3, 'name'=>'Dp', 'city'=>'Dnipro'],
                ['id_location'=>4, 'name'=>'Ch', 'city'=>'Chernivtsi'],
                ['id_location'=>5, 'name'=>'Kv', 'city'=>'Kyiv'],
                ['id_location'=>6, 'name'=>'Kh', 'city'=>'Kharkiv'],
                ['id_location'=>7, 'name'=>'Rv', 'city'=>'Rivne'],
                ['id_location'=>8, 'name'=>'Sf', 'city'=>'Sofia'],
            ]);
        $command->execute();

        $this->execute('
                ALTER TABLE `tbl_location`
                ADD PRIMARY KEY (`id_location`);
            ');

        $this->execute('
                ALTER TABLE `tbl_user`
                ADD CONSTRAINT `location` FOREIGN KEY (`location`) REFERENCES `tbl_location` (`id_location`) ON DELETE CASCADE ON UPDATE CASCADE;
            ');
	}

	public function down()
	{
        $this->dropForeignKey('location', 'tbl_user');
		$this->dropTable('tbl_location');
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