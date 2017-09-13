<?php

class m170908_060538_add_teacher_feedback_id_and_expert_feedback_id_columns_to_students_table extends CDbMigration
{
    public function safeUp()
    {
        $tableSchema = Yii::app()->db->schema->getTable('students');
        if ($tableSchema !== null) {
            $this->addColumn('students', 'teacher_feedback_id', 'integer');
            $this->addColumn('students', 'expert_feedback_id', 'integer');
            $this->addForeignKey(
                'fk_teacher_feedback',
                'students',
                'teacher_feedback_id',
                'teacher_feedbacks',
                'id',
                'CASCADE',
                'CASCADE'
            );
            $this->addForeignKey(
                'fk_expert_feedback',
                'students',
                'expert_feedback_id',
                'expert_feedbacks',
                'id',
                'CASCADE',
                'CASCADE'
            );
        }
    }

    public function safeDown()
    {
        $tableSchema = Yii::app()->db->schema->getTable('students');
        if ($tableSchema !== null) {
            $this->dropForeignKey('fk_teacher_feedback', 'students');
            $this->dropForeignKey('fk_expert_feedback', 'students');
            $this->dropColumn('students', 'teacher_feedback_id');
            $this->dropColumn('students', 'expert_feedback_id');
        }
    }
}
