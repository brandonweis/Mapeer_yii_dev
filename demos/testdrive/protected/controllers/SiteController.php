<?php
Yii::import('application.vendors.facebook.Facebook');

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		// $this->facebookConnect();
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	function facebookConnect()
	{
		$facebook = new Facebook(array(
		  'appId'  => "257209471021866",
		  'secret' => "9e3e934b52f42f499770d39ca8e38fe1"
		));
		 
		$session = $facebook->getUser();
		
		$me = null;
		
		try 
		{
			$me = $facebook->api('/me');
		} 
		catch (FacebookApiException $e) 
		{
			$session = null;
			error_log($e);
		}
		d($me);
		if($session == null)
		{
			$redirect_uri = "http" . (($_SERVER['HTTPS']) ? "s" : "") . "://" . $_SERVER['SERVER_NAME'] . ((in_array($_SERVER['SERVER_PORT'], array(80, 443)) ? "" : ":" . $_SERVER['SERVER_PORT'])) . "/";
			
			$redirect_uri .= Yii::app()->request->requestUri;
			
			//return json to tell frontend to popup permission dialog
			$params = array(
			  'scope' => 'email, read_stream, friends_likes, user_birthday, publish_stream, user_about_me',
			  'redirect_uri' => $redirect_uri
			);

			$loginUrl = $facebook->getLoginUrl($params);
			
			echo "<script>self.parent.location.href = '$loginUrl'</script>";
			// debug($me);
			// debug($session);
			exit;
		} 
	}
}