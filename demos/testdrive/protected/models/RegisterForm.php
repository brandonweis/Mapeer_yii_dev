<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
	public $username;
	public $password;
	public $password_confirm;
	
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('username, password, password_confirm', 'required'),
			array('username', 'username_validate'),
			array('password, password_confirm', 'password_confirm_validation'),
		);
	}


	public function password_confirm_validation()
	{
		if($this->password != $this->password_confirm)
		{
			$this->addError('password_confirm','Password not matched.');
		}
	}
	
	public function username_validate()
	{
		if(!User::model()->validateEmail($this->username))
		{
			$this->addError('username','Incorrect username format');
		}
	}
	
	
	public function login_after_register()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate(true);
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			Yii::app()->user->login($this->_identity);
			return true;
		}
		else
			return false;
	}
	
	function createRandomSalt() { 

		$chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
		srand((double)microtime()*1000000); 
		$i = 0; 
		$pass = '' ; 

		while ($i <= 7) { 
			$num = rand() % 33; 
			$tmp = substr($chars, $num, 1); 
			$pass = $pass . $tmp; 
			$i++; 
		} 

		return $pass; 
	} 

}
