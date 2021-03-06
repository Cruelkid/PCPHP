<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 * @property string $login
 * @property string $password
 * @property integer $location
 * @property string $type
 *
 * The followings are the available model relations:
 * @property UserGroup[] $userGroups
 * @property UserRoles[] $userRoles
 * @property Locations $location0
 */
class User extends CActiveRecord
{
    public $id;
    public $first_name;
    public $last_name;
    public $username;
    public $password;
    public $location_id;
    public $picture;
    public $type;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'users';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, password, location', 'required'),
            array('location', 'numerical', 'integerOnly' => true),
            array('firstname, lastname, username, password, type', 'length', 'max' => 45),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, firstname, lastname, username, password, location, type', 'safe', 'on' => 'search'),
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
            'UserGroup' => array(self::HAS_MANY, 'UserGroup', 'user'),
            'userRoles' => array(self::HAS_MANY, 'UserRoles', 'user'),
            'location0' => array(self::BELONGS_TO, 'Locations', 'location'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'id',
            'first_name' => 'firstname',
            'last_name' => 'lastname',
            'login' => 'login',
            'password' => 'password',
            'location' => 'location',
            'type' => 'type',
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
        $criteria = new CDbCriteria;
        $criteria->compare('id', $this->id);
        $criteria->compare('first_name', $this->firstname, true);
        $criteria->compare('last_name', $this->lastname, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('location', $this->location);
        $criteria->compare('type', $this->type, true);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
