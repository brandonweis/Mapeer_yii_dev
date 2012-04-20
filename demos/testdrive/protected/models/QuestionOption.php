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
class QuestionOption extends CActiveRecord 
{
	public $shot_id;
	public $option;
	public $answer;
    // ... other attributes
 
    public function rules()
    {
        return array(
			array('shot_id, option, answer', 'required')
		);
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
		return 'question_option';
	}
}