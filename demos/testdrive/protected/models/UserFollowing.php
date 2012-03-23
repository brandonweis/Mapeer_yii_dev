<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 */
class UserFollowing extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
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
		return 'tbl_user_following';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, following_id', 'required'),
			array('following_id', 'user_exist'),
		);
	}

	public function user_exist($user_id)
	{
		// $user=User::model()->find(
			// 'select'=>'id',
			// 'condition'=>'id=:id',
			// 'params'=>array(':id'=>user_id),
		// );
		
		if(!empty($user))
			return false;
		else
			return true;
	}

}