<?php

class QuestionController extends Controller
{
	
	// public $layout='//layouts/main';
	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionAnswer()
	{
		// $shot_id, $question_option_id
		$shot_id = 27;
		$answer_id = 1;
		$options = QuestionOption::model()->find('shot_id=:shot_id AND id=:id', array(':shot_id'=>$shot_id, ':id'=>$answer_id));
		
		if($options->answer == "yes"){
			d($options->answer);
			
		}
		
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		// $this->facebookConnect();
		// $this->render('index');
	}


}