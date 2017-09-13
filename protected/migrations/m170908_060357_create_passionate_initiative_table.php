<?php

class m170908_060357_create_passionate_initiative_table extends CDbMigration
{
    public function safeUp()
    {
        $tableSchema = Yii::app()->db->schema->getTable('passionate_initiative');
        if ($tableSchema === null) {
            $this->createTable(
                'passionate_initiative',
                [
                    'id' => 'pk',
                    'name' => 'varchar(45) NOT NULL',
                ],
                'ENGINE=InnoDB CHARSET=utf8'
            );
        }
        $this->insertMultiple('passionate_initiative', [
            ['id' => 1, 'name' => 'Initiative'],
            ['id' => 2, 'name' => 'Equal to majority'],
            ['id' => 3, 'name' => "Can't evaluate"],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('passionate_initiative');
    }
}
