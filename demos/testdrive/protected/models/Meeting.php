<?php

/**
 * This is the model class for table "meeting".
 *
 * The followings are the available columns in table 'meeting':
 * @property integer $id
 * @property integer $name
 * @property integer $description
 * @property integer $chairman_id
 * @property integer $shot_str
 * @property integer $user_str
 * @property integer $coment_str
 * @property integer $created
 * @property integer $modified
 */
class Meeting extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Meeting the static model class
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
		return 'meeting';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, name, description, chairman_id, shot_str, user_str, coment_str, created, modified', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, chairman_id, shot_str, user_str, coment_str, created, modified', 'safe', 'on'=>'search'),
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
			'name' => 'Name',
			'description' => 'Description',
			'chairman_id' => 'Chairman',
			'shot_str' => 'Shot Str',
			'user_str' => 'User Str',
			'coment_str' => 'Coment Str',
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
		$criteria->compare('name',$this->name);
		$criteria->compare('description',$this->description);
		$criteria->compare('chairman_id',$this->chairman_id);
		$criteria->compare('shot_str',$this->shot_str);
		$criteria->compare('user_str',$this->user_str);
		$criteria->compare('coment_str',$this->coment_str);
		$criteria->compare('created',$this->created);
		$criteria->compare('modified',$this->modified);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}