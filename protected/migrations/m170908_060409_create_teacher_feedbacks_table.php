<?php

class m170908_060409_create_teacher_feedbacks_table extends CDbMigration
{
    public function safeUp()
    {
        $tableSchema = Yii::app()->db->schema->getTable('teacher_feedbacks');
        if ($tableSchema === null) {
            $this->createTable(
                'teacher_feedbacks',
                [
                    'id' => 'pk',
                    'learning_ability_id' => 'integer NOT NULL',
                    'overall_technical_competence_id' => 'integer NOT NULL',
                    'passionate_initiative_id' => 'integer NOT NULL',
                    'team_work_id' => 'integer NOT NULL',
                    'getting_things_done_id' => 'integer NOT NULL',
                    'active_communicator_id' => 'integer NOT NULL',
                ],
                'ENGINE=InnoDB CHARSET=utf8'
            );
            $this->addForeignKey(
                'fk_tf_learning_ability',
                'teacher_feedbacks',
                'learning_ability_id',
                'learning_ability',
                'id',
                'CASCADE',
                'CASCADE'
            );
            $this->addForeignKey(
                'fk_tf_overall_technical_competence',
                'teacher_feedbacks',
                'overall_technical_competence_id',
                'overall_technical_competence',
                'id',
                'CASCADE',
                'CASCADE'
            );
            $this->addForeignKey(
                'fk_tf_passionate_initiative',
                'teacher_feedbacks',
                'passionate_initiative_id',
                'passionate_initiative',
                'id',
                'CASCADE',
                'CASCADE'
            );
            $this->addForeignKey(
                'fk_tf_team_work',
                'teacher_feedbacks',
                'team_work_id',
                'team_work',
                'id',
                'CASCADE',
                'CASCADE'
            );
            $this->addForeignKey(
                'fk_tf_getting_things_done',
                'teacher_feedbacks',
                'getting_things_done_id',
                'getting_things_done',
                'id',
                'CASCADE',
                'CASCADE'
            );
            $this->addForeignKey(
                'fk_tf_active_communicator',
                'teacher_feedbacks',
                'active_communicator_id',
                'active_communicator',
                'id',
                'CASCADE',
                'CASCADE'
            );
        }
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_tf_learning_ability', 'teacher_feedbacks');
        $this->dropForeignKey('fk_tf_overall_technical_competence', 'teacher_feedbacks');
        $this->dropForeignKey('fk_tf_passionate_initiative', 'teacher_feedbacks');
        $this->dropForeignKey('fk_tf_team_work', 'teacher_feedbacks');
        $this->dropForeignKey('fk_tf_getting_things_done', 'teacher_feedbacks');
        $this->dropForeignKey('fk_tf_active_communicator', 'teacher_feedbacks');
        $this->dropTable('teacher_feedbacks');
    }
}
