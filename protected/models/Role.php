<?php

class Role extends CActiveRecord
{
    public $id;
    public $name;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'roles';
    }
}
