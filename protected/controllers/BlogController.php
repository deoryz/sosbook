<?php

class BlogController extends Controller
{

	public function actionIndex()
	{
		$this->layout='//layouts/column2';
		// print_r($_GET);
		// exit;

		$data = Blog::model()->getAllDataByDate($_GET['month'], $_GET['year'], $_GET['tag'], 2, false, $this->languageID);

		$this->render('index', array(
			'model'=>$data['data'],
			'jml'=>$data['jml'],
			'pages'=>$data['pages'],
		));
	}
	public function actionDetail($slug)
	{
		$this->layout='//layouts/column2';

		$data = Blog::model()->getData($slug, $this->languageID);

		$this->render('detail', array(
			'data'=>$data,
		));
	}

}