<?php

/**
 * This is the model class for table "user_like".
 *
 * The followings are the available columns in table 'user_like':
 * @property integer $id
 * @property integer $ip
 * @property integer $user_id
 * @property integer $object_id
 * @property integer $created
 * @property integer $modified
 */
class UserLike extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UserLike the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_like';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, ip, user_id, object_id, created, modified', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ip, user_id, object_id, created, modified', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ip' => 'Ip',
			'user_id' => 'User',
			'object_id' => 'Object',
			'created' => 'Created',
			'modified' => 'Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('ip',$this->ip);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('object_id',$this->object_id);
		$criteria->compare('created',$this->created);
		$criteria->compare('modified',$this->modified);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}