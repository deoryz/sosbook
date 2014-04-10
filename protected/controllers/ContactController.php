<?php

class ContactController extends Controller
{
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		);
	}	

	public function actionIndex()
	{
		$this->layout='//layouts/column2';

		// inisialisasi model
		$model =  new ContactForm;
		$model->scenario = 'insert';
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];

			if($model->validate())
			{

				// config email
				$messaged = $this->renderPartial('//mail/contact',array(
					'model'=>$model,
				),TRUE);
				$config = array(
					'to'=>array($model->email, $this->setting['email']),
					'subject'=>$model->subject,
					'message'=>$messaged,
				);
				// kirim email
				Common::mail($config);

				Yii::app()->user->setFlash('success','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();

			}

		}

		$listBlog = Blog::model()->getMenu($this->languageID);

		$newBlog = Blog::model()->getAllData(6, false, $this->languageID);

		$tag = Blog::model()->getTagArray();


		$this->render('index', array(
			'model'=>$model,
			'listBlog'=>$listBlog,
			'newBlog'=>$newBlog,
			'tag'=>$tag,
		));
	}
	

}