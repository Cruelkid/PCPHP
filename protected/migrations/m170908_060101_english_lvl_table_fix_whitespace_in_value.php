<?php

class m170908_060101_english_lvl_table_fix_whitespace_in_value extends CDbMigration
{
    public function safeUp()
    {
        $tableSchema = Yii::app()->db->schema->getTable('english_lvl');
        if ($tableSchema !== null) {
            $this->update(
                'english_lvl',
                [
                    'name' => 'upper-intermediate',
                ],
                'id=4'
            );
        }
    }

    public function safeDown()
    {
        $tableSchema = Yii::app()->db->schema->getTable('english_lvl');
        if ($tableSchema !== null) {
            $this->update(
                'english_lvl',
                [
                    'name' => 'upper- intermediate',
                ],
                'id=4'
            );
        }
    }
}
