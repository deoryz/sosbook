<?php

class BlogController extends ControllerAdmin
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layoutsAdmin/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
			array('admin.filter.AuthFilter', 
				'params'=>array(
					'actionAllowOnLogin'=>array('upload'),
				)
			),
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			(!Yii::app()->user->isGuest)?
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','index','view','create','update'),
				'users'=>array(Yii::app()->user->name),
			):array(),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Blog;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Blog']))
		{
			$model->attributes=$_POST['Blog'];

			//validation Layanan Description
			unset($modelDesc);
			$valid=true;

			$model->image = $session['upload_foto'][1];

			$model->date_input = $_POST['Date']['year'].'-'.$_POST['Date']['month'].'-'.$_POST['Date']['date'].' '.$_POST['Date']['hours'].':'.$_POST['Date']['minute'].'-'.$_POST['Date']['second'];

			// $image = CUploadedFile::getInstance($model,'image');
			// $model->image = substr(md5(time()),0,5).'-'.$image->name;

			if($model->validate() AND $valid){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					$doc = new DOMDocument();
					$doc->loadHTML($model->content);
					$xpath = new DOMXPath($doc);
					$src = $xpath->evaluate("string(//img/@src)"); # "/images/image.jpg"
					if ($src == '') {
						$model->image = Yii::app()->baseUrl.'images/not-available.jpg';
					}else{
						$model->image = $src;
					}
					// $image->saveAs(Yii::getPathOfAlias('webroot').'/images/blog/'.$model->image);
					// $model->date_input = date("Y-m-d H:i:s");
					$model->date_update = date("Y-m-d H:i:s");
					$model->insert_by = Yii::app()->user->name;
					$model->last_update_by = Yii::app()->user->name;
					$tag = explode(',', $model->tag);
					$model->save();

					BlogTag::model()->deleteAll('blog_id = :blog_id',array(':blog_id'=>$model->id));
					foreach ($tag as $key => $value) {
						$modelTag = new BlogTag;
						$modelTag->blog_id = $model->id;
						$modelTag->tag = $value;
						$modelTag->slug = Slug::create($value);
						$modelTag->save();
					}

					Log::createLog("Blog Controller Create $model->id");
					Yii::app()->user->setFlash('success','Data has been inserted');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		if ($model->date_input == '') {
			$model->date_input = date('Y-m-d H:i:s');
		}

		$this->render('create',array(
			'model'=>$model,
			'modelDesc'=>$modelDesc,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Blog']))
		{
			$model->attributes=$_POST['Blog'];

			unset($modelDesc);
			$valid=true;

			// $image = CUploadedFile::getInstance($model,'image');
			// if ($image->name != '') {
			// 	$model->image = substr(md5(time()),0,5).'-'.$image->name;
			// }

			$model->date_input = $_POST['Date']['year'].'-'.$_POST['Date']['month'].'-'.$_POST['Date']['date'].' '.$_POST['Date']['hours'].':'.$_POST['Date']['minute'].'-'.$_POST['Date']['second'];

			if($model->validate() AND $valid){
				$transaction=$model->dbConnection->beginTransaction();
				try
				{
					// if ($image->name != '') {
					// 	$image->saveAs(Yii::getPathOfAlias('webroot').'/images/blog/'.$model->image);
					// }
					$doc = new DOMDocument();
					$doc->loadHTML($model->content);
					$xpath = new DOMXPath($doc);
					$src = $xpath->evaluate("string(//img/@src)"); # "/images/image.jpg"
					if ($src == '') {
						$model->image = Yii::app()->baseUrl.'images/not-available.jpg';
					}else{
						$model->image = $src;
					}

					$model->date_update = date("Y-m-d H:i:s");
					$model->last_update_by = Yii::app()->user->name;

					$tag = explode(',', $model->tag);

					$model->save();

					BlogTag::model()->deleteAll('blog_id = :blog_id',array(':blog_id'=>$model->id));
					foreach ($tag as $key => $value) {
						$modelTag = new BlogTag;
						$modelTag->blog_id = $model->id;
						$modelTag->tag = $value;
						$modelTag->slug = Slug::create($value);
						$modelTag->save();
					}

					Log::createLog("BlogController Update $model->id");
					Yii::app()->user->setFlash('success','Data Edited');
				    $transaction->commit();
					$this->redirect(array('update','id'=>$model->id));
				}
				catch(Exception $ce)
				{
				    $transaction->rollback();
				}
			}
		}

		if ($model->tag == '') {
			$model->tag = Blog::model()->getTagData($model->id);
		}

		$this->render('update',array(
			'model'=>$model,
			'modelDesc'=>$modelDesc,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			BlogTag::model()->deleteAll('blog_id = :blog_id', array(':blog_id'=>$id));
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Blog('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Blog']))
			$model->attributes=$_GET['Blog'];

		$dataProvider=new CActiveDataProvider('Blog');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Blog::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='blog-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}