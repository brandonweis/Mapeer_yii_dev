<?php

class FileUploadController extends CController
{
	public function accessRules()
	{
		return array(
			array('allow',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
    public function actionUploadImage()
    {
		$this->extract_by_character();
		
		$formModel = new ShotUploadForm;
        if(isset($_POST['ShotUploadForm']))
        {
            $formModel->attributes=$_POST['ShotUploadForm'];
			$formModel->image = CUploadedFile::getInstance($formModel,'image');
			$formModel->user_id = $_POST['ShotUploadForm']['user_id'];
			$formModel->description = $_POST['ShotUploadForm']['description'];

			d($formModel->image);
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
				d($imageName);	

				$model = new FileUpload;
				
				$model->image = $imageName;
				$model->user_id = $formModel->user_id;
				$model->description = $formModel->description;
				d($model);
				if($model->save())
				{
					// d(Yii::app()->basePath.'/../images/upload.jpg');
					$formModel->image->saveAs($_SERVER['DOCUMENT_ROOT'] . $imageName);
					// redirect to success page
				}
			}
        }
        $this->render('uploadimage', array('formModel'=>$formModel));
    }
	
	private function extract_by_character($text="@crystal travelling with @joseph@gmail.com", $character="@"){
		
		static $pos = 0;
		$space = " ";
		$extract = array();

		
		$i=1;
		while($pos < strlen($text)){
			
			$char_pos = strpos($text, $character, $pos);
			if($char_pos === false){ //end of string to search, 3 equal sign to check for falure of searching instead of when index = 0
				break;
			}
			
			$space_pos = strpos($text, $space, $char_pos);
			
			if(!$space_pos){ //end of string to search
				$extract[] = substr($text, $char_pos);
				$pos = strlen($text);
			}
			else{
				$extract[] = substr($text, $char_pos, $space_pos-$char_pos); //no need to substract 1 index as we don't want the space
				$pos = $space_pos;
			}
			
		}

	}
}

?>