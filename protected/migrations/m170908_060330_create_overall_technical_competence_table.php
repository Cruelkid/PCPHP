<?php

class m170908_060330_create_overall_technical_competence_table extends CDbMigration
{
    public function safeUp()
    {
        $tableSchema = Yii::app()->db->schema->getTable('overall_technical_competence');
        if ($tableSchema === null) {
            $this->createTable(
                'overall_technical_competence',
                [
                    'id' => 'pk',
                    'name' => 'varchar(45) NOT NULL',
                ],
                'ENGINE=InnoDB CHARSET=utf8'
            );
        }
        $this->insertMultiple('overall_technical_competence', [
            ['id' => 1, 'name' => 'Strong'],
            ['id' => 2, 'name' => 'Good'],
            ['id' => 3, 'name' => 'Non-technical'],
            ['id' => 4, 'name' => "Can't evaluate"],
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('overall_technical_competence');
    }
}
