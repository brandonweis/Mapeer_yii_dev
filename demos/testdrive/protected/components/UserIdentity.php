<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate($new_user_login = false)
	{
		if(!$new_user_login)
		{
			User::model()->find();
			$criteria=new CDbCriteria;
			$criteria->select='username, password, salt, email';  // only select the 'title' column
			$criteria->condition='username=:username';
			$criteria->params=array(':username'=>$this->username);
			
			$user=User::model()->find($criteria); // $params is not needed
			// d($criteria);
			// d($this->username);
			// d($user->username);
			// d($user->password);
			// d($user->email);
			// d(self::ERROR_USERNAME_INVALID);
			// d(self::ERROR_NONE);
			
			if(empty($user->username) || empty($user->password) || empty($user->email) || empty($user->salt)){
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			}
			else{	
				if($user->validatePassword($this->password)){
					$this->errorCode=self::ERROR_NONE;
				}else{
					$this->errorCode=self::ERROR_PASSWORD_INVALID;
				}
			
			}
			/* $users=array(
				// username => password
				'demo'=>'demo',
				'admin'=>'admin',
			);
			if(!isset($users[$this->username]))
				$this->errorCode=self::ERROR_USERNAME_INVALID;
			else if($users[$this->username]!==$this->password)
				$this->errorCode=self::ERROR_PASSWORD_INVALID;
			else
				$this->errorCode=self::ERROR_NONE; */
		}
		else
		{
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
}