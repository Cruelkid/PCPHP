<?php

class UserGroup extends CActiveRecord
{
    public $id;
    public $user_id;
    public $group_id;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'user_groups';
    }

    public function relations()
    {
        return [
            'group' => [self::BELONGS_TO, 'Group', 'group_id'],
        ];
    }
}
