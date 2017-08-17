<?php

/**
 * This is the model class for table "groups".
 *
 * The followings are the available columns in table 'groups':
 * @property integer $id
 * @property string $name
 * @property integer $location
 * @property integer $direction
 * @property string $start_date
 * @property string $finish_date
 * @property string $budget
 * @property string $expert
 *
 * The followings are the available model relations:
 * @property GroupExperts[] $groupExperts
 * @property Directions $direction0
 * @property Locations $location0
 * @property UserGroups[] $userGroups
 */
class Group extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'groups';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return [
            ['name, location, direction, budget, expert', 'required'],
            ['location, direction', 'numerical', 'integerOnly'=>true],
            ['name, budget', 'length', 'max'=>45],
            ['expert', 'length', 'max'=>50],
            ['start_date, finish_date', 'safe'],
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            ['id, name, location, direction, start_date, finish_date, budget, expert', 'safe', 'on'=>'search'],
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'groupExperts' => array(self::HAS_MANY, 'GroupExperts', 'group'),
            'direction0' => array(self::BELONGS_TO, 'Directions', 'direction'),
            'location0' => array(self::BELONGS_TO, 'Locations', 'location'),
            'userGroups' => array(self::HAS_MANY, 'UserGroups', 'group'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'location' => 'Location',
            'direction' => 'Direction',
            'start_date' => 'Start Date',
            'finish_date' => 'Finish Date',
            'budget' => 'Budget',
            'expert' => 'Expert',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('id',$this->id);
        $criteria->compare('name',$this->name,true);
        $criteria->compare('location',$this->location);
        $criteria->compare('direction',$this->direction);
        $criteria->compare('start_date',$this->start_date,true);
        $criteria->compare('finish_date',$this->finish_date,true);
        $criteria->compare('budget',$this->budget,true);
        $criteria->compare('expert',$this->expert,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Group the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}