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
class FileUpload extends CActiveRecord 
{
	public $image;
	public $user_id;
	public $description;
	public $location;
	public $lat;
	public $lng;
    // ... other attributes
 
    public function rules()
    {
        return array();
    }
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fileupload';
	}
}