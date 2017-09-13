<?php

class m170908_060403_create_getting_things_done_table extends CDbMigration
{
    public function safeUp()
    {
        $tableSchema = Yii::app()->db->schema->getTable('getting_things_done');
        if ($tableSchema === null) {
            $this->createTable(
                'getting_things_done',
                [
                    'id' => 'pk',
                    'name' => 'varchar(45) NOT NULL',
                ],
                'ENGINE=InnoDB CHARSET=utf8'
            );
        }
        $this->insertMultiple('getting_things_done', [
            ['id' => 1, 'name' => 'Strong area'],
            ['id' => 2, 'name' => 'Needs improvement'],
            ['id' => 3, 'name' => "Can't evaluate"],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('getting_things_done');
    }
}
