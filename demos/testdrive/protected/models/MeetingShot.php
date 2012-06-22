<?php

/**
 * This is the model class for table "meeting_shot".
 *
 * The followings are the available columns in table 'meeting_shot':
 * @property integer $id
 * @property integer $meeting_id
 * @property integer $shot_id
 * @property integer $created
 * @property integer $modified
 */
class MeetingShot extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return MeetingShot the static model class
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
		return 'meeting_shot';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, meeting_id, shot_id, created, modified', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, meeting_id, shot_id, created, modified', 'safe', 'on'=>'search'),
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
			'meeting_id' => 'Meeting',
			'shot_id' => 'Shot',
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
		$criteria->compare('meeting_id',$this->meeting_id);
		$criteria->compare('shot_id',$this->shot_id);
		$criteria->compare('created',$this->created);
		$criteria->compare('modified',$this->modified);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}