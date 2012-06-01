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
class UserData extends CActiveRecord
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
		return 'tbl_user_data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, data_type, data, created', 'required'),
			array('user_id', 'user_exist'),
		);
	}

	public function user_exist()
	{
		$user_id = $this->user_id;
		d($user_id);
		$user = User::model()->findByPk($user_id);
		
		if(!empty($user)){
			// d($user);
			return true;
		}else{
			// d($user);
			return false;
		}
	}

}