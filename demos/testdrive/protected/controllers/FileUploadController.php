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
}

?>