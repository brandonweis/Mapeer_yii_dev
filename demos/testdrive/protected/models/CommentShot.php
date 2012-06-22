<?php

/**
 * This is the model class for table "comment_shot".
 *
 * The followings are the available columns in table 'comment_shot':
 * @property integer $id
 * @property integer $shot_id
 * @property integer $user_id
 * @property integer $comment
 * @property integer $comment_with_link
 * @property integer $user_str
 * @property integer $lat
 * @property integer $lng
 * @property integer $location
 * @property integer $created
 * @property integer $modified
 */
class CommentShot extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CommentShot the static model class
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
		return 'comment_shot';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, shot_id, user_id, comment, comment_with_link, user_str, lat, lng, location, created, modified', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, shot_id, user_id, comment, comment_with_link, user_str, lat, lng, location, created, modified', 'safe', 'on'=>'search'),
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
			'shot_id' => 'Shot',
			'user_id' => 'User',
			'comment' => 'Comment',
			'comment_with_link' => 'Comment With Link',
			'user_str' => 'User Str',
			'lat' => 'Lat',
			'lng' => 'Lng',
			'location' => 'Location',
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
		$criteria->compare('shot_id',$this->shot_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('comment',$this->comment);
		$criteria->compare('comment_with_link',$this->comment_with_link);
		$criteria->compare('user_str',$this->user_str);
		$criteria->compare('lat',$this->lat);
		$criteria->compare('lng',$this->lng);
		$criteria->compare('location',$this->location);
		$criteria->compare('created',$this->created);
		$criteria->compare('modified',$this->modified);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}