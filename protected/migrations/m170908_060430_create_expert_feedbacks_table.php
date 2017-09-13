<?php

class m170908_060430_create_expert_feedbacks_table extends CDbMigration
{
    public function safeUp()
    {
        $tableSchema = Yii::app()->db->schema->getTable('expert_feedbacks');
        if ($tableSchema === null) {
            $this->createTable(
                'expert_feedbacks',
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
                'fk_ef_learning_ability',
                'expert_feedbacks',
                'learning_ability_id',
                'learning_ability',
                'id',
                'CASCADE',
                'CASCADE'
            );
            $this->addForeignKey(
                'fk_ef_overall_technical_competence',
                'expert_feedbacks',
                'overall_technical_competence_id',
                'overall_technical_competence',
                'id',
                'CASCADE',
                'CASCADE'
            );
            $this->addForeignKey(
                'fk_ef_passionate_initiative',
                'expert_feedbacks',
                'passionate_initiative_id',
                'passionate_initiative',
                'id',
                'CASCADE',
                'CASCADE'
            );
            $this->addForeignKey(
                'fk_ef_team_work',
                'expert_feedbacks',
                'team_work_id',
                'team_work',
                'id',
                'CASCADE',
                'CASCADE'
            );
            $this->addForeignKey(
                'fk_ef_getting_things_done',
                'expert_feedbacks',
                'getting_things_done_id',
                'getting_things_done',
                'id',
                'CASCADE',
                'CASCADE'
            );
            $this->addForeignKey(
                'fk_ef_active_communicator',
                'expert_feedbacks',
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
        $this->dropForeignKey('fk_ef_learning_ability', 'expert_feedbacks');
        $this->dropForeignKey('fk_ef_overall_technical_competence', 'expert_feedbacks');
        $this->dropForeignKey('fk_ef_passionate_initiative', 'expert_feedbacks');
        $this->dropForeignKey('fk_ef_team_work', 'expert_feedbacks');
        $this->dropForeignKey('fk_ef_getting_things_done', 'expert_feedbacks');
        $this->dropForeignKey('fk_ef_active_communicator', 'expert_feedbacks');
        $this->dropTable('expert_feedbacks');
    }
}
