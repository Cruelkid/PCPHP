<?php

class m170908_060407_create_active_communicator_table extends CDbMigration
{
    public function safeUp()
    {
        $tableSchema = Yii::app()->db->schema->getTable('active_communicator');
        if ($tableSchema === null) {
            $this->createTable(
                'active_communicator',
                [
                    'id' => 'pk',
                    'name' => 'varchar(45) NOT NULL',
                ],
                'ENGINE=InnoDB CHARSET=utf8'
            );
        }
        $this->insertMultiple('active_communicator', [
            ['id' => 1, 'name' => 'Listener and presenter'],
            ['id' => 2, 'name' => 'Listener'],
            ['id' => 3, 'name' => 'Weak communication'],
            ['id' => 4, 'name' => "Can't evaluate"],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('active_communicator');
    }
}
