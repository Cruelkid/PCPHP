<?php

class m170908_060251_add_cv_url_column_to_students_table extends CDbMigration
{
    public function safeUp()
    {
        $tableSchema = Yii::app()->db->schema->getTable('students');
        if ($tableSchema !== null) {
            $this->addColumn('students', 'cv_url', 'varchar(120) NOT NULL');
        }
    }

    public function safeDown()
    {
        $tableSchema = Yii::app()->db->schema->getTable('students');
        if ($tableSchema !== null) {
            $this->dropColumn('students', 'cv_url');
        }
    }
}
