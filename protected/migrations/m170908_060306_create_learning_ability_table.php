<?php

class m170908_060306_create_learning_ability_table extends CDbMigration
{
    public function safeUp()
    {
        $tableSchema = Yii::app()->db->schema->getTable('learning_ability');
        if ($tableSchema === null) {
            $this->createTable(
                'learning_ability',
                [
                    'id' => 'pk',
                    'name' => 'varchar(45) NOT NULL',
                ],
                'ENGINE=InnoDB CHARSET=utf8'
            );
        }
        $this->insertMultiple('learning_ability', [
            ['id' => 1, 'name' => 'Quick'],
            ['id' => 2, 'name' => 'Normal'],
            ['id' => 3, 'name' => 'Hard to learn'],
            ['id' => 4, 'name' => "Can't evaluate"],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('learning_ability');
    }
}
