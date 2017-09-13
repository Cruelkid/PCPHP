<?php

class UserRole extends CActiveRecord
{
    public $id;
    public $user_id;
    public $role_id;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'user_roles';
    }

    public function relations()
    {
        return [
            'roles' => [self::BELONGS_TO, 'Role', 'role_id'],
            'users' => [self::BELONGS_TO, 'User', 'user_id'],
        ];
    }
}
