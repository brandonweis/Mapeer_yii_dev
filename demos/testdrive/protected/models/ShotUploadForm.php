<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ShotUploadForm extends CFormModel
{
	public $image;
	public $user_id;
	public $description;
	public $location;

	public function rules()
    {
        return array(
					array('image', 
							'file', 
							'types'=>'jpg, gif, png',
							'maxSize'=>1024 * 1024 * 50, // 50MB
							'tooLarge'=>'The file was larger than 50MB. Please upload a smaller file.',
							),
			
        );
    }

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'image'=>'You image here!',
			'description'=>'Share your photo story!',
			'location'=>'Where did you take this photo?',
		);
	}


}
