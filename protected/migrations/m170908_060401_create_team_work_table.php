<?php

class m170908_060401_create_team_work_table extends CDbMigration
{
    public function safeUp()
    {
        $tableSchema = Yii::app()->db->schema->getTable('team_work');
        if ($tableSchema === null) {
            $this->createTable(
                'team_work',
                [
                    'id' => 'pk',
                    'name' => 'varchar(45) NOT NULL',
                ],
                'ENGINE=InnoDB CHARSET=utf8'
            );
        }
        $this->insertMultiple('team_work', [
            ['id' => 1, 'name' => 'Team player'],
            ['id' => 2, 'name' => 'Works alone'],
            ['id' => 3, 'name' => 'Leader'],
            ['id' => 4, 'name' => "Can't evaluate"],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('team_work');
    }
}
