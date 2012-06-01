<?php

class FileUploadController extends Controller
{
	public $layout='//layouts/main';
	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionWallFeed(){
		// $this->layout = true;
		$model=FileUpload::model()->findAll();
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		
		// foreach($model as $temp){
			// d($temp->options);
		// }
		
		$this->render('wallfeed',array(
			'model'=>$model,
		));
	}
	
	public function actionTest()
    {
		$this->layout = false;
		$this->render('test');
	}
	
	public function actionLike()
    {
		$this->layout = false;
		$shot_id = 1;
		
		$user_id = Yii::app()->user->id;
		$data_type = "like";
		
		$like = UserData::model()->find('user_id=:user_id AND data_type=:data_type', array(':user_id'=>$user_id, ':data_type'=>$data_type));

		d($like->data);

		if(!empty($like->data)){
			$likeStr = json_decode($like->data);
			
			$user_data = $like;
			// return;
		}
		else{
			$user_data = new UserData;
			
		}
		
		$temp->shot_id = $shot_id;
		$temp->created_date = date(DATE_ATOM);
		$likeStr[] = $temp;
		
		d($likeStr);
		
		$likeStr = json_encode($likeStr);

		$user_data->user_id = $user_id;
		$user_data->data_type = "like";
		$user_data->data = $likeStr;
		$user_data->created = date(DATE_ATOM);
		
		d($user_data);
		
		return $user_data->save();
		
		
		// $this->render('test');
	}
	
	public function actionViewShot($id=null)
	{
		$model = $this->loadModel($id);
		
		$this->render('viewshot',array(
			'model'=>$model,
		));
	}
	
    public function actionUploadImage()
    {
		// d($_GET['iframe']);
		// $user_str = "";
		// $user_str = json_encode($this->extract_by_character());
		// d($user_str$user_str = "";
		// $user_str = json_encode($this->extract_by_character());
		// d($user_str);
		
		$formModel = new ShotUploadForm;
        if(isset($_POST['ShotUploadForm']))
        {
			//populate all the post data into the form model for validation
            $formModel->attributes=$_POST['ShotUploadForm'];
			$formModel->image = CUploadedFile::getInstance($formModel,'image');
			$formModel->user_id = $_POST['ShotUploadForm']['user_id'];
			$formModel->description = $_POST['ShotUploadForm']['description'];
			$formModel->location = $_POST['ShotUploadForm']['location'];
			$formModel->lat = $_POST['ShotUploadForm']['lat'];
			$formModel->lng = $_POST['ShotUploadForm']['lng'];

			
			// exit;
			// d($formModel);
			
			// d($formModel->image);
			if($formModel->validate())
			{
				$imageExtension = $formModel->image->getExtensionName();
				$imageName = genRandomString(50,'',array(
							'alphaSmall'=>true,
							'alphaBig'=>true,
							'num'=>true,
							'othr'=>false
							));
										
				$imageName =  Yii::app()->request->baseUrl . '/images/' . $imageName . '.' . $imageExtension;
				// d($imageName);	

				$description_with_link = "";
				
				$model = new FileUpload;
				
				//extract user contact in description
				$user_str = json_encode($this->extract_by_character($formModel->description, $description_with_link));
				
				$model->image = $imageName;
				$model->user_id = $formModel->user_id;
				$model->description = $formModel->description;
				$model->description_with_link = $description_with_link;
				$model->user_str = $user_str;
				$model->lat = $formModel->lat;
				$model->lng = $formModel->lng;
				$model->location = $formModel->location;

				if($model->save())
				{
					// d(Yii::app()->basePath.'/../images/upload.jpg');
					$formModel->image->saveAs($_SERVER['DOCUMENT_ROOT'] . $imageName);
					// redirect to success page
				}
				
				$question_options = $_POST['ShotUploadForm']['options'];
			
				// d($question_options);
				// $question_option = new QuestionOption;
				
				foreach($question_options as $index => $option){
					// d($option);
					if($option == "" || empty($option))
						continue;
					
					$question_option = new QuestionOption;
					
					$question_option->shot_id = $model->id; //get the saved shot id
					$question_option->option = $option;
					$question_option->answer = ($index == 1) ? "yes" : "no";
					
					// d($question_option);
					
					$question_option->save();
				}
				
			}
        }
        $this->render('uploadimage', array('formModel'=>$formModel, 'iframe'=>$_GET['iframe']));
    }
	
	private function extract_by_character($text="@crystal wanna travel? @brandon@techsailor.com @kokweiong@gmail.com", &$description_with_link, $character="@"){
		
		$pos = 0;
		$space = " ";
		$extract = array();
		$text_to_save = $text;
		
		while($pos < strlen($text)){
			
			$char_pos = strpos($text, $character, $pos);
			//end of string to search, 3 equal sign to check for falure of searching instead of when index = 0
			if($char_pos === false){ 
				break;
			}
			
			$space_pos = strpos($text, $space, $char_pos);
			
			//end of string to search
			if(!$space_pos){
				$contact = substr($text, $char_pos+1); //+1 to eliminate "@"
				$pos = strlen($text);
			}
			else{
				$contact= substr($text, $char_pos+1, $space_pos-$char_pos); //no need to add 1 index as we don't want the space behind the contact
				$pos = $space_pos;
			}
			
			//replace any spaces in contact
			$contact = str_replace(" ", "", $contact);
			
			
			//default contact type = handler
			$type = "handler";
			if(User::model()->validateEmail($contact)){
				$type = "email";
			}	
			
			$temp_contact = array('contact'=>$contact, 'type'=>$type);
			
			//send email to new user or notification to new user
			$this->notify_user($temp_contact);
			
			// d($temp_contact);
			if($temp_contact['user_id'] != NULL)
				$extract[] = $temp_contact;
		
			// type might change if email exist before in database
			$type = $temp_contact['type'];
			
			// d($extract);
			//replace the contact with links to the contact profile, replace contact together with the "@"
			if($type == "email"){
				$contact_link = "<a href='#" . $temp_contact['user_id'] . "'>@Anonymous</a>";
			}
			elseif($type == "handler"){
				$contact_link = "<a href='#" . $temp_contact['user_id'] . "'>@" . $temp_contact['contact'] . "</a>";
			}
			
			$text_to_save = str_replace("@" . $temp_contact['contact'], $contact_link, $text_to_save); 

		}
		
		//return the description with contact link in html by pass reference
		$description_with_link = $text_to_save;
		// d($extract);
		return $extract;
		
	}
	
	
	private function notify_user(&$contact = array()){
		
		if($contact['type'] == "email"){
			
			$user = new User;
			$email_user = $user->findByAttributes(array('email'=>$contact['contact']));
			
			if($email_user){
				// id the email was registered before, update the mentioned count 
				$email_user->mentioned_count = $email_user->mentioned_count + 1;
				
				$email_user->save();
				
				$user_id = $email_user->id;
				
				//if the exisiting email have handler and password and status is not invited, change the contact to using handler and type to handler
				if($email_user->handler != null AND $email_user->password != null AND $email_user->status != 'invited'){
					$contact['type'] = "handler";
					$contact['contact'] = $email_user->handler;
				}
			}
			else{
			
				//save the email in the user table with status 'invited' and send email to new user
				$user = new User;
				
				$user->username = $user->email = $contact['contact'];
				$user->mentioned_count = 1;
				$user->status = "invited";
				$user->save();
				
				$user_id = $user->id;
			}
		}
		elseif($contact['type'] == "handler"){
			// look in database for handler to notify existing user
			
			$user = new User;
			$existing_user = $user->findByAttributes(array('handler'=>$contact['contact']));

			if($existing_user){
				$existing_user->mentioned_count = $existing_user->mentioned_count + 1;

				$existing_user->save();
				
				$user_id = $existing_user->id;
			}
		}
		
		$contact['user_id'] = $user_id;
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=FileUpload::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
}

?>