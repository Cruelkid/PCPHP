<?php

class m170814_141732_create_users_table extends CDbMigration
{
	public function up()
	{
        $this->execute('
                CREATE TABLE IF NOT EXISTS `tbl_user` (
                `id_user` int(11) NOT NULL,
                `username` varchar(45) NOT NULL,
                `password` varchar(45) DEFAULT NULL,
                `fullname` varchar(45) DEFAULT NULL,
                `location` int(11) DEFAULT NULL,
                `type` varchar(45) DEFAULT NULL
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
            ');

        $builder=Yii::app()->db->schema->commandBuilder;
        $command=$builder->createMultipleInsertCommand('tbl_user', [
            ['id_user'=>1, 'username'=>'YuriyBezhachnyuk', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>1, 'type'=>'itacademy'],
            ['id_user'=>2, 'username'=>'MykolaDemchyna', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>1, 'type'=>'itacademy'],
            ['id_user'=>3, 'username'=>'AndriyPereymybida', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>2, 'type'=>'itacademy'],
            ['id_user'=>4, 'username'=>'KhrystynaRomaniv', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>2, 'type'=>'itacademy'],
            ['id_user'=>5, 'username'=>'MaryanaLopatynska', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>2, 'type'=>'itacademy'],
            ['id_user'=>6, 'username'=>'MykhayloPlesha', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>2, 'type'=>'itacademy'],
            ['id_user'=>7, 'username'=>'ViktoriyaRyazhska', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>2, 'type'=>'itacademy'],
            ['id_user'=>8, 'username'=>'AndriyKorkuna', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>2, 'type'=>'itacademy'],
            ['id_user'=>9, 'username'=>'LiubomyrHalamaha', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>2, 'type'=>'itacademy'],
            ['id_user'=>10, 'username'=>'YaroslavHarasym', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>2, 'type'=>'itacademy'],
            ['id_user'=>11, 'username'=>'IhorV.Kohut', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>2, 'type'=>'itacademy'],
            ['id_user'=>12, 'username'=>'LesyaKlakovych', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>2, 'type'=>'itacademy'],
            ['id_user'=>13, 'username'=>'ViacheslavKoldovskyi', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>2, 'type'=>'itacademy'],
            ['id_user'=>14, 'username'=>'DmytroPetin', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>3, 'type'=>'itacademy'],
            ['id_user'=>15, 'username'=>'ShvetsOleg', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>3, 'type'=>'itacademy'],
            ['id_user'=>16, 'username'=>'ReutaOlexander', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>3, 'type'=>'itacademy'],
            ['id_user'=>17, 'username'=>'MykolayevTaras', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>3, 'type'=>'itacademy'],
            ['id_user'=>18, 'username'=>'NataliiaRomanenko', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>4, 'type'=>'itacademy'],
            ['id_user'=>19, 'username'=>'YevheniyUdovychenko', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>5, 'type'=>'itacademy'],
            ['id_user'=>20, 'username'=>'DmytroMinochkin', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>5, 'type'=>'itacademy'],
            ['id_user'=>21, 'username'=>'MaksymKhudoliy', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>6, 'type'=>'itacademy'],
            ['id_user'=>22, 'username'=>'MykhailoOmelchuk', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>7, 'type'=>'itacademy'],
            ['id_user'=>23, 'username'=>'YulianBoyanov', 'password'=>'softserve', 'fullname'=>NULL, 'location'=>8, 'type'=>'itacademy'],
        ]);
        $command->execute();

        $this->execute('
                ALTER TABLE `tbl_user`
                ADD PRIMARY KEY (`id_user`),
                ADD UNIQUE KEY `usernameUniqueIndex` (`username`),
                ADD KEY `location_idx` (`location`);
            ');
	}

	public function down()
	{
		$this->dropTable('tbl_user');
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