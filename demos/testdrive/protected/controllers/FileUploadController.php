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
        $model=new FileUpload;
        if(isset($_POST['FileUpload']))
        {
            // $model->attributes=$_POST['FileUpload'];
            $model->image = CUploadedFile::getInstance($model,'image');
            $model->user_id = $_POST['FileUpload']['user_id'];
            $model->description = $_POST['FileUpload']['description'];
			d($model);
            if($model->save())
            {
				// d(Yii::app()->basePath.'/../images/upload.jpg');
                $model->image->saveAs(Yii::app()->basePath.'/../images/upload.jpg');
                // redirect to success page
            }
        }
        $this->render('uploadimage', array('model'=>$model));
    }
}

?>